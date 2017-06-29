<?php

namespace App\Modules\Admin\Http\Pages;

trait UserPage
{

    /**
     * Render view
     *
     * @param View
     */
    public function indexPage()
    {
      return view(self::ADMIN.'.modules.admin.user.index');
    }


}
