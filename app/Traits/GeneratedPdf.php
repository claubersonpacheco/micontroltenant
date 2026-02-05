<?php
namespace App\Traits;

use Spatie\Browsershot\Browsershot;
trait GeneratedPdf
{
    public function PdfWithChrome(string $template, string $storagePath, $budget)
    {
        if( config('services.generate_pdf') === 'production') {
            $nodeBinary = '/usr/bin/node';
            $npmBinary  = '/usr/bin/npm';
            $chromePath = '/usr/bin/google-chrome';
        } else {
            $nodeBinary = 'C:\\Program Files\\nodejs\\node.exe';
            $npmBinary  = 'C:\\Program Files\\nodejs\\npm.cmd';
            $chromePath = 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';
        }

        Browsershot::html($template)
            ->setNodeBinary($nodeBinary)
            ->setNpmBinary($npmBinary)
            ->setOption('args', ['--no-sandbox'])
            ->setOption('executablePath', $chromePath)
            ->emulateMedia('screen')
            ->showBackground()
            ->showBrowserHeaderAndFooter()
            ->hideHeader()
            ->footerHtml($this->getFooterHtml($budget))
            ->setOption('pageRanges', '1-')
            ->format('A4')
            ->timeout(120)
            ->waitUntilNetworkIdle()
            ->ignoreHttpsErrors()
            ->savePdf($storagePath);
    }


    function getFooterHtml($budget)
    {
        ob_start() ?>
        <style>
            .pageFooter {
                -webkit-print-color-adjust: exact;
                font-family: system-ui;
                font-size: 6pt;
                text-align: center;
                width: 100%;
                display: block;
                border-top: #71717a;
            }
        </style>
        <div class="pageFooter">
            <span>Página</span> <span class="pageNumber"></span> de <span class="totalPages"></span>
        </div>
        <?php return ob_get_clean();
    }
}
