<?php
namespace App\Traits;

use Spatie\Browsershot\Browsershot;
trait GeneratedPdf
{
    public function PdfWithChrome($template, $storagePath, $budget)
    {
        Browsershot::html($template)
            ->setNodeBinary('/usr/bin/node') // 'C:\\Program Files\\nodejs\\node.exe'
            ->setNpmBinary('/usr/bin/npm') //'C:\\Program Files\\nodejs\\npm.cmd'
            ->setOption('args', ['--no-sandbox'])
            ->setOption('executablePath', '/usr/bin/google-chrome' ) //'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe'
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
