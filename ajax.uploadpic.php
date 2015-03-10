<?php
/******************************************************************************

参数说明:
$max_file_size  : 上传文件大小限制, 单位BYTE
$destination_folder : 上传文件路径
$watermark   : 是否附加水印(1为加水印,其他为不加水印);

使用说明:
1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库;
2. 将extension_dir =改为你的php_gd2.dll所在目录;
******************************************************************************/

//上传文件类型列表
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=1024*1024*2;     //上传文件大小限制, 单位BYTE
$destination_folder="img/brand/"; //上传文件路径
$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);
$watertype=0;      //水印类型(1为文字,2为图片)
$waterposition=0;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
$waterstring="tabenying";  //水印字符串
$waterimg="";    //水印图片
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/4;    //缩略图比例

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])){
         echo "图片不存在!";
         exit;
    }
	#检查文件大小
    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"]){
        echo "文件太大!";
        exit;
    }
	#检查文件类型
    if(!in_array($file["type"], $uptypes)){
        echo "文件类型不符!".$file["type"];
        exit;
    }
	#是否存在
    if(!file_exists($destination_folder)){
        mkdir($destination_folder);
    }
	
    $tmp_name=$file["tmp_name"];
    $image_size = getimagesize($tmp_name);
    $destination = $destination_folder.$file["name"];
    if (file_exists($destination))
    {
        //echo "同名文件已经存在了".$destination;
        //exit;
        unlink($destination);
    }

    if(!move_uploaded_file ($tmp_name, $destination))
    {
        echo "移动文件出错";
        exit;
    }

    $return_data=array();
    $return_data["path"] = $destination;
    $return_data["width"] = $image_size[0];
    $return_data["height"] = $image_size[1];
    $return_data["size"] = (int)($file["size"]/1024)."kb";
	echo json_encode($return_data);
}
?>