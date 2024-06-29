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
                ->addDirective(Directive::FRAME, 'self data: *.youtube.com *.google.com')
                ->addDirective(Directive::CONNECT, 'self blob: consentlog.cookieyes.com log.cookieyes.com cdn-cookieyes.com *.google-analytics.com')
                ->addDirective(Directive::FONT, 'self data: *.googleapis.com *.gstatic.com')
                ->addDirective(Directive::SCRIPT, 'self report-sample *.googletagmanager.com *.google.com *.gstatic.com www.facebook.com twitter.com www.instagram.com www.youtube.com *.cloudflare.com cdn-cookieyes.com *.datatables.net scentivaid.com unsafe-inline blob: data: unsafe-eval')
                ->addDirective(Directive::STYLE, 'self report-sample *.cloudflare.com *.googleapis.com *.datatables.net unsafe-inline')
                ->addDirective(Directive::IMG, 'self data: blob: *.cloudflare.com cdn-cookieyes.com img.youtube.com dev.alfabet.io android-webview-video-poster: data:')
                ->addDirective(Directive::MEDIA, 'self data: blob:')
                ->addDirective(Directive::OBJECT, 'unsafe-eval *.kemenag.dev *.kemenag.go.id data: localhost')
                ->addDirective(Directive::FORM_ACTION, 'senibudaya.test *.kemenag.go.id *.kemenag.dev localhost')
                ->addDirective(Directive::FRAME_ANCESTORS, 'https://www.facebook.com/ scentivaid.com *.kemenag.dev *.kemenag.go.id')
                ->addDirective(Directive::SANDBOX, 'allow-scripts allow-forms allow-modals allow-same-origin allow-popups allow-popups-to-escape-sandbox')
                ->addDirective(Directive::CHILD, 'self www.youtube.com www.googletagmanager.com')
                ->addDirective(Directive::MANIFEST, 'self')
                ->addDirective(Directive::WORKER, 'self blob: *.facebook.com data:')
                ->addDirective(Directive::DEFAULT, 'data: blob: self unsafe-inline unsafe-eval')
                ->addDirective(Directive::UPGRADE_INSECURE_REQUESTS, Value::NO_VALUE)
                ->addDirective(Directive::BLOCK_ALL_MIXED_CONTENT, Value::NO_VALUE);
    }
}
