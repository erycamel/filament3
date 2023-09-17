<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dlprospek
 * 
 * @property int $pk
 * @property string $nota
 * @property Carbon $tanggal
 * @property string $kdspv
 * @property string $kdsales
 * @property string $kdtipe
 * @property string $kdwarna
 * @property string $nospk
 * @property string $kdtipe2
 * @property string $kdwarna2
 * @property string $nospk2
 * @property string $kdtipe3
 * @property string $kdwarna3
 * @property string $nospk3
 * @property string $nama
 * @property string $handphone
 * @property string $custtype
 * @property string $custstatus
 * @property string $customerjob
 * @property string $ket
 * @property string $prospectcategory
 * @property Carbon $tglappplan
 * @property Carbon $tglappactual
 * @property bool $testdrive
 * @property bool $askdealcermat
 * @property bool $asktradein
 * @property bool $appraisaltradein
 * @property string $dealtradein
 * @property bool $isfirstcontacted
 * @property Carbon $firstcontacted
 * @property bool $isfirstconnected
 * @property Carbon $firstconnected
 * @property string $sourceofsales
 * @property int $cetak
 * @property bool $post
 * @property bool $suspect
 * @property Carbon $tglsuspect
 * @property bool $prospek
 * @property Carbon $tglprospek
 * @property bool $hprospek
 * @property Carbon $tglhprospek
 * @property bool $settle
 * @property Carbon $tglsettle
 * @property string $idsettle
 * @property bool $batal
 * @property string $idbatal
 * @property string $ketbatal
 * @property Carbon $tglbatal
 * @property string $status
 * @property string $tatapmuka
 *
 * @package App\Models
 */
class Dlprospek extends Model
{
	protected $table = 'dlprospek';
	protected $primaryKey = 'pk';
	public $timestamps = false;

	protected $casts = [
		'tanggal' => 'datetime',
		'tglappplan' => 'datetime',
		'tglappactual' => 'datetime',
		'testdrive' => 'bool',
		'askdealcermat' => 'bool',
		'asktradein' => 'bool',
		'appraisaltradein' => 'bool',
		'isfirstcontacted' => 'bool',
		'firstcontacted' => 'datetime',
		'isfirstconnected' => 'bool',
		'firstconnected' => 'datetime',
		'cetak' => 'int',
		'post' => 'bool',
		'suspect' => 'bool',
		'tglsuspect' => 'datetime',
		'prospek' => 'bool',
		'tglprospek' => 'datetime',
		'hprospek' => 'bool',
		'tglhprospek' => 'datetime',
		'settle' => 'bool',
		'tglsettle' => 'datetime',
		'batal' => 'bool',
		'tglbatal' => 'datetime'
	];

	protected $fillable = [
		'nota',
		'tanggal',
		'kdspv',
		'kdsales',
		'kdtipe',
		'kdwarna',
		'nospk',
		'kdtipe2',
		'kdwarna2',
		'nospk2',
		'kdtipe3',
		'kdwarna3',
		'nospk3',
		'nama',
		'handphone',
		'custtype',
		'custstatus',
		'customerjob',
		'ket',
		'prospectcategory',
		'tglappplan',
		'tglappactual',
		'testdrive',
		'askdealcermat',
		'asktradein',
		'appraisaltradein',
		'dealtradein',
		'isfirstcontacted',
		'firstcontacted',
		'isfirstconnected',
		'firstconnected',
		'sourceofsales',
		'cetak',
		'post',
		'suspect',
		'tglsuspect',
		'prospek',
		'tglprospek',
		'hprospek',
		'tglhprospek',
		'settle',
		'tglsettle',
		'idsettle',
		'batal',
		'idbatal',
		'ketbatal',
		'tglbatal',
		'status',
		'tatapmuka'
	];
}
