<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Menu as model_menu;
use App\Models\Slider as model_slider;
use App\Models\Admin\Setting as model_setting;
use App\Models\Admin\Bannerads as model_banner;
use App\Http\Controllers\Controller as Controller;


class Meta extends Controller
{

	public function meta()
	{
		$setting = model_setting::firstOrFail();
		if ((!is_null($setting)) and ($setting->count() != 0)) {
			if ($setting->logo == null) {
				$setting->logo						= url('assets/images/logo/logotubaba.png');
			} else {
				$setting->logo						= url('assets/images/logo/' . $setting->logo);
			}
		}

		foreach ($setting->toArray() as $key => $val) {
			$result[$key] = $val;
		}

		$menu 	= model_menu::orderBy('order_menu', 'ASC')->get();
		$result['menu'] = self::Menu(0, $menu, "");

		$banner = model_banner::get();
		if (!is_null($banner)) {
			$position = [];
			$i = 1;
			foreach ($banner as $key) {

				if ($key->posisi == 'slider footer') {
					$position[$key->posisi][$i++] = array(
						"keterangan" => $key->keterangan,
						"link" => $key->link,
						"img" => url('assets/images/bannerads/' . $key->img),
					);
				} else {
					$position[$key->posisi] = array(
						"keterangan" => $key->keterangan,
						"link" => $key->link,
						"img" => url('assets/images/bannerads/' . $key->img),
					);
				}
			}
		}
		$result['banner'] = $position;

		return $result;
	}

	public function Menu($parent, $data, $hasil)
	{
		$hasone = self::Filter($parent, $data);
		$link  = '';


		foreach ($hasone as $item) {
			if ($item->link == Null) {
				$link = url('/informasi' . '/' . strtolower(Str::slug($item->nama_menu, "-")));
				$target = '_self';
			} elseif ($item->link == 'berita') {
				$link = url('/news');
				$target = '_self';
			} elseif ($item->link == 'kategori') {
				$link = url('/news/kategori' . '/' . strtolower(Str::slug($item->nama_menu, "-")));
				$target = '_self';
			} elseif ($item->link == 'galeri') {
				$link = url('/gallery');
				$target = '_self';
			} elseif ($item->link == 'hubungi-kami') {
				$link = url('/contact');
				$target = '_self';
			} elseif ($item->link == 'opd') {
				$link = url('/news/opd');
				$target = '_self';
			} elseif ($item->link == 'kecamatan') {
				$link = url('/news/kecamatan');
				$target = '_self';
			} else {
				$link = 'http://' . $item->link;
				$target = '_blank';
			};

			$hastwo	= self::Filter($item->id, $data);

			if (count((array)$hastwo) > 0) {
				$hasil .= '<li><a href="javascript:void(0);">' . strtoupper($item->nama_menu) . '</a>';
				$hasil .= '<ul class="dropdown">';
				$hasil  = $this->Menu($item->id, $data, $hasil);
				$hasil .= '</ul>';
			} else {
				$hasil .= '<li><a href="' . $link . '" target="' . $target . '">' . strtoupper($item->nama_menu) . '</a></li>';
			}
			$hasil .= '</li>';
		}
		return $hasil;
	}

	public function Filter($parent, $data)
	{
		if ($data != null) { //jika $data tidak sama dengan null maka
			$result = array(); //set variabel result dengan array
			foreach ($data as $val) { //untuk setiap data dirubah menjadi val
				if ($val->id_parent == $parent) { //id_parent dari vall sama dengan $parent dari parameter
					$result[] = $val; //isi result dengan nilai val
				}
			}
			return $result; //return result
		} else {
			return [];
		}
	}

	public function slider()
	{
		$slider = model_slider::orderBy('id', 'DESC')->get();

		foreach ($slider as $key => $val) {
			if ($val['img']) {
				$slider[$key]['img'] = url('assets/images/slider/' . $val['img']);
			} else {
				$slider[$key]['img'] = url('assets/images/slider/slider-1.jpg');
			}
		}

		$result['slider'] 			= $slider->toArray();

		return $result;
	}
}
