<?php

namespace App\Modules\Share\Http\Pages;

trait UserPage
{

    /**
     * Render view
     *
     * @param View
     */
    public function indexPage()
    {
      return view(self::SHARE.'.modules.share.user.index');
    }


}
