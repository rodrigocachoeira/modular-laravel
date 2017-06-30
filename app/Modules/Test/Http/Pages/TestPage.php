<?php

namespace App\Modules\Test\Http\Pages;

trait TestPage
{

    /**
     * Render view
     *
     * @param View
     */
    public function indexPage()
    {
      return view(self::TEST.'.modules.test.test.index');
    }


}
