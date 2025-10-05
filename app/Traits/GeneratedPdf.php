<?php
namespace App\Traits;

use Spatie\Browsershot\Browsershot;
trait GeneratedPdf
{
    public function PdfWithChrome(string  $template, string $storagePath, $budget)
    {
        Browsershot::html($template)
            ->setNodeBinary('C:\\Program Files\\nodejs\\node.exe') // '' /usr/bin/node
            ->setNpmBinary('C:\\Program Files\\nodejs\\npm.cmd') //'' /usr/bin/npm
            ->setOption('args', ['--no-sandbox'])
            ->setOption('executablePath', 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe' ) //'' /usr/bin/google-chrome
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
