<?php

namespace App\Console\Commands;

use App\Models\Product;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Lấy danh sách sản phẩm
        $products = Product::query()
        ->with('category')
        ->where('status', 1)
        ->whereNotNull('category_id')
        ->get();

        foreach ($products as $product) {
            // Thêm URL sản phẩm vào sitemap
            $sitemap->add(Url::create(route('product', [$product->category->slug, $product->slug]))
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8));
        }

        // Lưu sitemap vào file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        logger($products);
        $this->info('Sitemap has been generated!');
    }
}
