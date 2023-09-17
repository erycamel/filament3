<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dlpdc
 * 
 * @property int $pk
 * @property string $nota
 * @property string $norangka
 * @property string $nomesin
 * @property string $kdmdl
 * @property string $katashiki
 * @property string $suffix
 * @property string $kdtipe
 * @property string $kdwarna
 * @property string $norrn
 * @property string $branch
 * @property Carbon $tanggal
 * @property string $kdvend
 * @property Carbon $deliverydate
 * @property string $keterangan
 * @property string $kdlok
 * @property string $kdsales
 * @property string $nodotam
 * @property Carbon $tgldotam
 * @property Carbon $thnbuat
 * @property int $cetak
 * @property string $nosp
 * @property Carbon $tglsp
 * @property string $bbakar
 * @property int $cc
 * @property string $nokunci
 * @property bool $lbuildup
 * @property bool $llain2
 * @property bool $lbekas
 * @property string $nosap
 * @property Carbon $tglsap
 * @property Carbon $tglmdp
 * @property string $nopol
 * @property Carbon $due
 * @property string $stall
 * @property float $harga
 * @property float $dpp
 * @property float $ppn
 * @property float $pph
 * @property float $luxtax
 * @property string $kode
 * @property bool $opsi
 * @property bool $settle
 * @property string $idsettle
 * @property Carbon $tglsettle
 * @property bool $batal
 * @property string $idbatal
 * @property Carbon $tglbatal
 * @property bool $post
 * @property string $idpost
 * @property Carbon|null $tglpost
 *
 * @package App\Models
 */
class Dlpdc extends Model
{
	protected $table = 'dlpdc';
	protected $primaryKey = 'pk';
	public $timestamps = false;

	protected $casts = [
		'tanggal' => 'datetime',
		'deliverydate' => 'datetime',
		'tgldotam' => 'datetime',
		'thnbuat' => 'datetime',
		'cetak' => 'int',
		'tglsp' => 'datetime',
		'cc' => 'int',
		'lbuildup' => 'bool',
		'llain2' => 'bool',
		'lbekas' => 'bool',
		'tglsap' => 'datetime',
		'tglmdp' => 'datetime',
		'due' => 'datetime',
		'harga' => 'float',
		'dpp' => 'float',
		'ppn' => 'float',
		'pph' => 'float',
		'luxtax' => 'float',
		'opsi' => 'bool',
		'settle' => 'bool',
		'tglsettle' => 'datetime',
		'batal' => 'bool',
		'tglbatal' => 'datetime',
		'post' => 'bool',
		'tglpost' => 'datetime'
	];

	protected $fillable = [
		'nota',
		'norangka',
		'nomesin',
		'kdmdl',
		'katashiki',
		'suffix',
		'kdtipe',
		'kdwarna',
		'norrn',
		'branch',
		'tanggal',
		'kdvend',
		'deliverydate',
		'keterangan',
		'kdlok',
		'kdsales',
		'nodotam',
		'tgldotam',
		'thnbuat',
		'cetak',
		'nosp',
		'tglsp',
		'bbakar',
		'cc',
		'nokunci',
		'lbuildup',
		'llain2',
		'lbekas',
		'nosap',
		'tglsap',
		'tglmdp',
		'nopol',
		'due',
		'stall',
		'harga',
		'dpp',
		'ppn',
		'pph',
		'luxtax',
		'kode',
		'opsi',
		'settle',
		'idsettle',
		'tglsettle',
		'batal',
		'idbatal',
		'tglbatal',
		'post',
		'idpost',
		'tglpost'
	];
}
