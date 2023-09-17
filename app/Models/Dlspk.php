<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dlspk
 * 
 * @property int $pk
 * @property string $nota
 * @property string|null $notahp
 * @property string $kdspv
 * @property string $kdsales
 * @property string $kdwarna
 * @property Carbon $tglspk
 * @property string $kdtipe
 * @property string $kdmdl
 * @property string $nama
 * @property string $alamat
 * @property string $noblok
 * @property string $komplek
 * @property string $dusun
 * @property string $norumah
 * @property string $nortrw
 * @property string $kota
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kabkota
 * @property string $provinsi
 * @property string $kodepos
 * @property string $telepon
 * @property string $teleponfu
 * @property string $handphone
 * @property string $handphonefu
 * @property string $email
 * @property string $emailfu
 * @property string $npwp
 * @property string $namafakpjk
 * @property string $alamatfakpjk
 * @property string $kotafakpjk
 * @property string $kecamatanfakpjk
 * @property string $kelurahanfakpjk
 * @property string $kabkotaidfakpjk
 * @property string $provinsifakpjk
 * @property string $paycode
 * @property string $custtype
 * @property float $hjual
 * @property float $hjualfu
 * @property float $discrp1
 * @property float $discrp2
 * @property float $discrpfu
 * @property float $ppnp
 * @property float $sisadp
 * @property float $persendp
 * @property float $jlhdp
 * @property Carbon $tglvia
 * @property string $via
 * @property int $jangkawaktu
 * @property float $persenbunga
 * @property float $angbln
 * @property float $byadm
 * @property float $byansuransi
 * @property float $bypolis
 * @property float $bayar1
 * @property float $byprovisi
 * @property float $bylain2
 * @property float $discpotbyr1
 * @property float $arleasing
 * @property float $arlstrm
 * @property Carbon $tglarlstrm
 * @property float $arsales
 * @property float $arsalestrm
 * @property Carbon $tglarsalestrm
 * @property float $panjar1
 * @property float $panjar2
 * @property float $panjar3
 * @property float $jumlah
 * @property string $warna
 * @property string $JnsKlm
 * @property string $agama
 * @property Carbon $tgllahir
 * @property string $noktp
 * @property string $kdket
 * @property string $kdcust
 * @property float $jlhpt
 * @property float $jlhpg
 * @property float $optional
 * @property string $ketbbn
 * @property float $bbn
 * @property Carbon $tglserah
 * @property Carbon $tglbayar
 * @property Carbon $tanggal
 * @property string $ket
 * @property string $ket2
 * @property string $ketfu
 * @property int $cetak
 * @property bool $post
 * @property string $nodo1
 * @property string $katashiki
 * @property string $suffix
 * @property Carbon $tglmatching
 * @property string $idmatching
 * @property Carbon $tglunmatching
 * @property string $idunmatching
 * @property bool $status
 * @property string $kode
 * @property string $kdasu
 * @property bool $settle
 * @property string $idsettle
 * @property Carbon $tglsettle
 * @property bool $batal
 * @property string $idbatal
 * @property string $ketbatal
 * @property Carbon $tglbatal
 * @property bool|null $ispdd
 * @property Carbon|null $tglinputpdd
 * @property Carbon|null $tglpdd
 * @property string|null $ketpdd
 * @property bool $tipepdd
 * @property Carbon|null $tglpenyerahan
 * @property Carbon|null $tgldisc2
 * @property string $iddisc2
 * @property bool $isdisc2
 * @property string $komisinama
 * @property float $komisinilai
 * @property string $npwpkomisi
 * @property bool $iskomisi
 * @property Carbon $tglkomisi
 * @property string $idkomisi
 * @property bool $iskomisitransfer
 * @property bool $isoptional
 * @property string $idoptional
 * @property Carbon $tgloptional
 * @property Carbon|null $tglmasu
 * @property Carbon|null $tglaasu
 * @property string|null $tipeasu
 *
 * @package App\Models
 */
class Dlspk extends Model
{
	protected $table = 'dlspk';
	protected $primaryKey = 'pk';
	public $timestamps = false;

	protected $casts = [
		'tglspk' => 'datetime',
		'hjual' => 'float',
		'hjualfu' => 'float',
		'discrp1' => 'float',
		'discrp2' => 'float',
		'discrpfu' => 'float',
		'ppnp' => 'float',
		'sisadp' => 'float',
		'persendp' => 'float',
		'jlhdp' => 'float',
		'tglvia' => 'datetime',
		'jangkawaktu' => 'int',
		'persenbunga' => 'float',
		'angbln' => 'float',
		'byadm' => 'float',
		'byansuransi' => 'float',
		'bypolis' => 'float',
		'bayar1' => 'float',
		'byprovisi' => 'float',
		'bylain2' => 'float',
		'discpotbyr1' => 'float',
		'arleasing' => 'float',
		'arlstrm' => 'float',
		'tglarlstrm' => 'datetime',
		'arsales' => 'float',
		'arsalestrm' => 'float',
		'tglarsalestrm' => 'datetime',
		'panjar1' => 'float',
		'panjar2' => 'float',
		'panjar3' => 'float',
		'jumlah' => 'float',
		'tgllahir' => 'datetime',
		'jlhpt' => 'float',
		'jlhpg' => 'float',
		'optional' => 'float',
		'bbn' => 'float',
		'tglserah' => 'datetime',
		'tglbayar' => 'datetime',
		'tanggal' => 'datetime',
		'cetak' => 'int',
		'post' => 'bool',
		'tglmatching' => 'datetime',
		'tglunmatching' => 'datetime',
		'status' => 'bool',
		'settle' => 'bool',
		'tglsettle' => 'datetime',
		'batal' => 'bool',
		'tglbatal' => 'datetime',
		'ispdd' => 'bool',
		'tglinputpdd' => 'datetime',
		'tglpdd' => 'datetime',
		'tipepdd' => 'bool',
		'tglpenyerahan' => 'datetime',
		'tgldisc2' => 'datetime',
		'isdisc2' => 'bool',
		'komisinilai' => 'float',
		'iskomisi' => 'bool',
		'tglkomisi' => 'datetime',
		'iskomisitransfer' => 'bool',
		'isoptional' => 'bool',
		'tgloptional' => 'datetime',
		'tglmasu' => 'datetime',
		'tglaasu' => 'datetime'
	];

	protected $fillable = [
		'nota',
		'notahp',
		'kdspv',
		'kdsales',
		'kdwarna',
		'tglspk',
		'kdtipe',
		'kdmdl',
		'nama',
		'alamat',
		'noblok',
		'komplek',
		'dusun',
		'norumah',
		'nortrw',
		'kota',
		'kelurahan',
		'kecamatan',
		'kabkota',
		'provinsi',
		'kodepos',
		'telepon',
		'teleponfu',
		'handphone',
		'handphonefu',
		'email',
		'emailfu',
		'npwp',
		'namafakpjk',
		'alamatfakpjk',
		'kotafakpjk',
		'kecamatanfakpjk',
		'kelurahanfakpjk',
		'kabkotaidfakpjk',
		'provinsifakpjk',
		'paycode',
		'custtype',
		'hjual',
		'hjualfu',
		'discrp1',
		'discrp2',
		'discrpfu',
		'ppnp',
		'sisadp',
		'persendp',
		'jlhdp',
		'tglvia',
		'via',
		'jangkawaktu',
		'persenbunga',
		'angbln',
		'byadm',
		'byansuransi',
		'bypolis',
		'bayar1',
		'byprovisi',
		'bylain2',
		'discpotbyr1',
		'arleasing',
		'arlstrm',
		'tglarlstrm',
		'arsales',
		'arsalestrm',
		'tglarsalestrm',
		'panjar1',
		'panjar2',
		'panjar3',
		'jumlah',
		'warna',
		'JnsKlm',
		'agama',
		'tgllahir',
		'noktp',
		'kdket',
		'kdcust',
		'jlhpt',
		'jlhpg',
		'optional',
		'ketbbn',
		'bbn',
		'tglserah',
		'tglbayar',
		'tanggal',
		'ket',
		'ket2',
		'ketfu',
		'cetak',
		'post',
		'nodo1',
		'katashiki',
		'suffix',
		'tglmatching',
		'idmatching',
		'tglunmatching',
		'idunmatching',
		'status',
		'kode',
		'kdasu',
		'settle',
		'idsettle',
		'tglsettle',
		'batal',
		'idbatal',
		'ketbatal',
		'tglbatal',
		'ispdd',
		'tglinputpdd',
		'tglpdd',
		'ketpdd',
		'tipepdd',
		'tglpenyerahan',
		'tgldisc2',
		'iddisc2',
		'isdisc2',
		'komisinama',
		'komisinilai',
		'npwpkomisi',
		'iskomisi',
		'tglkomisi',
		'idkomisi',
		'iskomisitransfer',
		'isoptional',
		'idoptional',
		'tgloptional',
		'tglmasu',
		'tglaasu',
		'tipeasu'
	];
}
