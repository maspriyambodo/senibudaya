<?php
$time = new DateTime('Asia/Jakarta');
?>
<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="{{ url('/main-sitemap.xsl') }}"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('/sitemap.xml') }}</loc>
        <lastmod><?php echo $time->format('Y-m-d H:i:s'); ?></lastmod>
    </sitemap>
    <?php
    foreach ($url_berita as $value) { ?>
        <sitemap>
            <loc>{{ url('/berita' . '/' . $value->slug_berita)}}</loc>
            <lastmod><?php echo $time->format($value->tanggal); ?></lastmod>
        </sitemap>
    <?php } ?>
</sitemapindex>