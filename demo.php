<?php
					//$file=fopen("qc.pdf","r");
					header('Content-type: application/pdf');
        			header('filename='.'qc.pdf');
        			readfile("qc.pdf");
				?>