<div class="col-lg-10 col-md-8 col-sm-12 col-xs-12">
	<div class="mb-2">
		<div class="btn-group">
			<label>Report: </label>
			<a href="<?= base_url(conf('path_module_lab') . 'report/by-periode?clinic_id='.$clinic_id); ?>" class="btn btn-flat btn-success btn-xs">By Periode</a>
			<a href="<?= base_url(conf('path_module_lab') . 'report/by-pemeriksaan?clinic_id='.$clinic_id); ?>" class="btn btn-flat btn-warning btn-xs">By Pemeriksaan</a>
			<a href="<?= base_url(conf('path_module_lab') . 'report/biaya-pemeriksaan?clinic_id='.$clinic_id); ?>" class="btn btn-flat btn-primary btn-xs">Biaya Pemeriksaan</a>
		</div>

	</div>
	<form method="get" action="">
		<input type="hidden" value="<?= (isset($clinic_id)) ? $clinic_id : ''; ?>" id="selected_clinic_id" name="clinic_id">
		<div class="card card-dashboard-one">
			<div class="card-header bg-purple border-bottom bg-primary">
				<div class="card-title">
					<h4 class="tx-white">Laporan Biaya Pemeriksaan </h4>
				</div>
				<?php if (!empty($list_pemeriksaan)) { ?>
					<div class="btn-group pull-right">
						<a href="<?= base_url(conf('path_module_lab') . 'report/biaya-pemeriksaan/export/excel?clinic_id='.$clinic_id.'&start_date=' . $start_date . '&end_date=' . $end_date . '&provider=' . $provider . '&jenis=' . $jenis . '&excel=true'); ?>" target="_blank" download class="btn btn-xs bg-white"><i class="fa fa-file-excel-o tx-success"></i> Download Excel</a>
						<a href="<?= base_url(conf('path_module_lab') . 'report/biaya-pemeriksaan/export/pdf?clinic_id='.$clinic_id.'&start_date=' . $start_date . '&end_date=' . $end_date . '&provider=' . $provider . '&jenis=' . $jenis . '&pdf=true'); ?>" target="_blank" download class="btn btn-xs bg-white"><i class="fa fa-file-pdf-o tx-danger"></i> Download PDF</a>
					</div>
				<?php } ?>
			</div>
			<div class="card-body  bg-bd-white-3">
				<table class="" width="auto" cellpadding="5" cellspacing="0">
					<tr>
						<td width="150px">Periode</td>
						<td width="5%">:</td>
						<td>
							<input name="start_date" value="<?= $start_date; ?>"> s/d
							<input name="end_date" value="<?= $end_date; ?>">
						</td>
					</tr>

					<tr>
						<td>Provider</td>
						<td>:</td>
						<td><select class="" name="provider">
								<?php
								foreach ($list_provider as $item) {
									$selected = ($provider == $item->id) ? "selected=''" : "";
									echo '<option value="' . $item->id . '" ' . $selected . '>' . $item->nama . '</option>';
								}
								?>
							</select></td>
					</tr>
					<tr>
						<td>Jenis Pemeriksaan</td>
						<td>:</td>
						<td><select class="" name="jenis">
								<?php
								foreach ($list_jenis as $jns) {
									$selected = ($jenis == $jns->id) ? "selected='selected'" : "";
									echo '<option value="' . $jns->id . '" ' . $selected . '>' . $jns->jenis . '</option>';
								}
								?>
							</select>
							<button type="submit" class="btn btn-xs btn-primary" style="margin-left: 20px">Submit</button>
						</td>
					</tr>
				</table>
				<p></p>
				<table width="100%" id="table table-bordered dataTable table-striped" border="1" cellpadding="5">
					<thead>
						<tr>
							<th>No</th>
							<th>Tgl Pemeriksaan</th>
							<th>Jumlah Sample</th>
							<th>Tgl Hasil</th>
							<th>Tarif per Sample</th>
							<th>Jumlah Biaya</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($list_biaya as $dt) {
							echo '<tr>
									<td class="text-center">' . $dt->no . '</td>
									<td class="text-center">' . $dt->tgl_periksa . '</td>
									<td class="text-center">' . $dt->qty . '</td>
									<td class="text-center">' . $dt->tgl_hasil . '</td>
									<td><span>Rp. </span><span class="pull-right">' . number_format($dt->tarif) . '</span></td>
									<td><span>Rp. </span><span class="pull-right">' . number_format($dt->total_tarif) . '</span></td>
								</tr>';
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2">Total</th>
							<th class="text-center"><?= $total_qty; ?></th>
							<th></th>
							<th></th>
							<th><span>Rp. </span><span class="pull-right"><?= number_format($total_biaya); ?></span></th>
						</tr>
					</tfoot>
				</table>
				<p><i>* Laporan ini hanya menampilkan data pemeriksaan dengan status "selesai"</i></p>
			</div>
		</div>
	</form>
</div>
