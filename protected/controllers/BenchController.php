 <?php

class BenchController extends Controller
{
    public $layout = false;

    public function actionPlain()
    {
        error_log("Memory used by plain action: " . memory_get_peak_usage());
        $this->render('plain');
    }

    public function actionModel()
    {
        for ($i = 0; $i < 100; $i++) {
            foreach (Bench::model()->findAll() as $b) {
                error_log($b->title);
            }
        }
        for ($i = 0; $i < 10; $i++) {
            $b = new Bench();
            $b->title = 'test bench';
            $b->save();
            $b->delete();
        }
        error_log("Memory used by model action: " . memory_get_peak_usage());
        $this->render('model');
    }
}
