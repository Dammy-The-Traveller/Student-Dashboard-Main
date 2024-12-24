<?php

namespace Core;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;

class QRcodeservice
{

    
    private $outputDirectory;

    public function __construct($outputDirectory =__DIR__ . '/../Public/assets/qrcodes/')
    {
        $this->outputDirectory = $outputDirectory;

        
        if (!is_dir($this->outputDirectory)) {
            mkdir($this->outputDirectory, 0755, true);
        };
    }
    

    /**
     * Generates a QR code for the provided data.
     *
     * @param string $data The content to encode in the QR code
     * @param string $filename Name of the output QR code file
     * @return string The path to the generated QR code image
     */

       
     
    public function generateQrCode($data, $filename = 'qr-code.png')
    {

        
        $outputPath = realpath($this->outputDirectory) . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($outputPath)) {
            unlink($outputPath);
        }

        $builder = new Builder(
            writer: new PngWriter(),
            writerOptions: [],
            validateResult: false,
            data: $data,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $result = $builder->build();

        $result->saveToFile($outputPath);

        
if (file_exists($outputPath)) {
    error_log('QR code successfully saved to: ' . $outputPath);
} else {
    error_log('Failed to save QR code to: ' . $outputPath);
}
        return $outputPath;
    }
}
