<?php

namespace App\Support;


use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;
use Spatie\Csp\Keyword;
use Spatie\Csp\Value;

class MyCustomPolicy extends Basic {

    public function configure() {
//        parent::configure();
        $this
                ->addDirective(Directive::BASE, 'self')
                ->addDirective(Directive::FRAME, 'self data: https://10.11.11.133 *.youtube.com *.google.com')
                ->addDirective(Directive::CONNECT, 'self blob: https://10.11.11.133 consentlog.cookieyes.com log.cookieyes.com cdn-cookieyes.com *.google-analytics.com')
                ->addDirective(Directive::FONT, 'self data: https://10.11.11.133 cdnjs.cloudflare.com *.googleapis.com *.gstatic.com')
                ->addDirective(Directive::SCRIPT, 'self report-sample https://10.11.11.133 cdn.jsdelivr.net static.cloudflareinsights.com ajax.googleapis.com maxcdn.bootstrapcdn.com *.googletagmanager.com *.google.com *.gstatic.com www.facebook.com twitter.com www.instagram.com www.youtube.com *.cloudflare.com cdn-cookieyes.com *.datatables.net scentivaid.com unsafe-inline blob: data: unsafe-eval')
                ->addDirective(Directive::STYLE, 'self report-sample https://10.11.11.133 cdn.jsdelivr.net maxcdn.bootstrapcdn.com *.cloudflare.com *.googleapis.com *.datatables.net unsafe-inline')
                ->addDirective(Directive::IMG, 'self data: blob: https://10.11.11.133 *.google.com kemenag.go.id *.cloudflare.com cdn-cookieyes.com scentivaid.com img.youtube.com dev.alfabet.io kemenag.go.id android-webview-video-poster: data:')
                ->addDirective(Directive::MEDIA, 'self data: blob: https://10.11.11.133 *.youtube.com youtu.be')
                ->addDirective(Directive::OBJECT, 'unsafe-eval https://10.11.11.133 *.kemenag.dev *.kemenag.go.id data: localhost')
                ->addDirective(Directive::FORM_ACTION, 'https://10.11.11.133 senibudaya.test scentivaid.com *.kemenag.go.id *.kemenag.dev self')
                ->addDirective(Directive::FRAME_ANCESTORS, 'https://10.11.11.133 https://www.facebook.com/ scentivaid.com *.kemenag.dev *.kemenag.go.id')
                ->addDirective(Directive::SANDBOX, 'allow-scripts allow-forms allow-modals allow-same-origin allow-popups allow-popups-to-escape-sandbox')
                ->addDirective(Directive::CHILD, 'self https://10.11.11.133 www.youtube.com www.googletagmanager.com')
                ->addDirective(Directive::MANIFEST, 'self')
                ->addDirective(Directive::WORKER, 'self blob: https://10.11.11.133 *.facebook.com data:')
                ->addDirective(Directive::DEFAULT, 'data: blob: self unsafe-inline unsafe-eval')
                ->addDirective(Directive::UPGRADE_INSECURE_REQUESTS, Value::NO_VALUE)
                ->addDirective(Directive::BLOCK_ALL_MIXED_CONTENT, Value::NO_VALUE);
    }
}
