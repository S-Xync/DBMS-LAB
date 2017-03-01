<?php
require_once 'Classes/PHPExcel/IOFactory.php';
	
$inputFileType = 'Excel5';
$inputFileName = 'green500_top_201611(no1strow).xlsx';

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcelReader = $objReader->load($inputFileName);

$loadedSheetNames = $objPHPExcelReader->getSheetNames();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'CSV');

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
    $objWriter->setSheetIndex($sheetIndex);
    $objWriter->save($loadedSheetName.'.csv');
}
?>
