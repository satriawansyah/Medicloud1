<body onload="load_data_temp()"></body>
<div class="row">
	<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card card-dashboard-one">
			<div class="card-header c-header-large">
				<div class="card-title">
					Pembelian
				</div>
				<div class="tx-center label-filter ">
					<label class="ftr align-middle">
						<select class="form-control input-sm inline-block" style="width: 120px; display: inline-block;" name="filter_jenis_bayar">
							<option value="">Semua</option>
							<option value="tunai">Tunai</option>
							<option value="kredit">Kredit</option>
						</select>
					</label>
					<label class="ftr align-middle">
						<input type="text" name="start_date" class="form-control input-sm" autocomplete="off" placeholder="YYYY-MM-DD" style="width: 90px; display: inline-block">
						s/d
						<input type="text" name="end_date" class="form-control input-sm" autocomplete="off" placeholder="YYYY-MM-DD" value="<?= date('Y-m-d'); ?>" style="width: 90px; display: inline-block">
					</label>
					<label class="ftr align-middle">
						<select class="form-control input-sm inline-block supplier" style="width: 150px; display: inline-block;" name="filter_supplier">
							<option value=""></option>
						</select>
					</label>

				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-success add-pembelian btn-xs"><i class="fa fa-plus"></i> Tambah Data</button>
					<a href="<?php echo site_url(); ?>farmasi/pembelian/export_"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-cloud-upload"></i> <span>Export</span> </button></a>
				</div>
			</div>
			<div class="card-body">
				<table class="table-bordered table-striped minimize-padding-all" id="dataPembelian" role="grid" aria-describedby="dataTable_info" width="100%" cellspacing="0">
					<thead>
						<tr role="row">
							<th>No.</th>
							<th><?= lang('label_invoice'); ?></th>
							<th><?= lang('label_date'); ?></th>
							<th><?= lang('label_tunaikredit'); ?></th>
							<th><?= lang('label_kredithari'); ?></th>
							<th><?= lang('label_jatuhtempo'); ?></th>
							<th><?= lang('label_supplier'); ?></th>
							<th><?= lang('label_total'); ?></th>
							<th><?= lang('label_user'); ?></th>
							<th><?= lang('label_action'); ?></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<div id="modal-manage-pembelian" class="modal">
	<div class="modal-dialog modal-xl" role="document">
		<form method="POST" name="form-manage-pembelian">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Farmasi pembelian obat </h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<section class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="form-label"><?= lang('label_date'); ?></label>
										<input class="datepicker form-control no-space input-sm" name="tanggal" value="<?= date('Y-m-d'); ?>" autocomplete="off">
									</div>
								</div>
								<div class="col-sm-6">
									<label class="form-label"><?= lang('label_invoice'); ?></label>
									<div class="d-grid gap-2 d-md-flex ">
										<input type="text" class="hide" name="_id" value="">
										<input type="text" id="faktur" name="faktur" class="form-control input-sm" required="" placeholder="<?= lang('label_invoice'); ?>" autocomplete="off" readonly="readonly">
										<button type="button" name="autocode" id="autocode" class="btn btn-secondary btn-block btn-xs" style="width: 40px;">SET</button>
									</div>
								</div>
							</div>
						</section>
						<section class="col-lg-6 col-md-6 col-sm-12 col-xs-12 border-left-dashed">
							<div class="row">

								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-3">
											<label class="form-label"><?= lang('label_payment'); ?></label>
											<div class="d-grid gap-2 d-md-flex ">
												<select id="tunai_kredit" class="form-control" name="tunai_kredit" style="width:100%;">
													<option value='tunai' selected="selected">Tunai</option>
													<option value='kredit'>Kredit</option>
												</select>
											</div>
										</div>
										<div class="form-group col-sm-2" id="kredit_h">
											<label class="form-label">Hari</label>
											<input type="number" name="kredit_hari" class="form-control input-sm" autocomplete="off">
										</div>
										<div class="form-group col-sm-3" id="jatuh_t">
											<label class="form-label">Jatuh Tempo</label>
											<input class="datepicker form-control no-space input-sm" name="jatuh_tempo" autocomplete="off">
										</div>
										<div class="col-sm-4">
											<label class="form-label"><?= lang('label_supplier'); ?></label>
											<div class="d-md-flex ">
												<select id="supplier" class="form-control supplier" name="supplier" style="width:100%;">
													<option value=''></option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<div class="row">
						<section class="col-md-12 border-top-dashed">
							<div class="row">

								<div class="col-sm-12">
									<div class="row">

										<div class="col-sm-12">
											<button type="button" id="cariobat" class="btn btn-secondary btn-block btn-xs cariobat" style="width: 80px;">Cari Obat <i class="fa fa-search"></i></button>

											<div class="row">
												<div class="form-group col-sm-2">

													<input type="hidden" name="id_obat" class="form-control input-sm clear" autocomplete="off">
													<label class="form-label" style="font-size: 9px;">Kode Obat</label>
													<input type="text" name="kode" class="form-control input-sm clear" autocomplete="off">
												</div>

												<div class="form-group col-sm-2">
													<label class="form-label" style="font-size: 9px;">Nama</label>
													<input type="text" name="nama" class="form-control input-sm clear" autocomplete="off">
												</div>

												<div class="form-group col-sm-2">
													<label class="form-label" style="font-size: 9px;">Satuan pembelian</label>
													<div class="d-grid d-md-flex ">
														<select id="satuanobat" class="form-control" name="satuanobat" style="width:100%;">
															<option value=""></option>
														</select>
													</div>
												</div>

												<div class="form-group col-sm-1">
													<label class="form-label" style="font-size: 9px;">QTY</label>
													<input type="number" step="1" name="qty" class="form-control input-sm clear" autocomplete="off">
												</div>
												<div class="form-group col-sm-1">
													<label class="form-label" style="font-size: 9px;">Harga</label>
													<input type="hidden" name="isi" class="form-control input-sm clear" autocomplete="off">
													<input type="hidden" name="hargaBeli" class="form-control input-sm clear" autocomplete="off">
													<input type="text" name="hargabeli" class="form-control input-sm" readonly>
												</div>

												<div class="form-group col-sm-1">
													<label class="form-label" style="font-size: 9px;">Disc %</label>
													<input type="number" step="1" name="diskon" class="form-control input-sm clear" autocomplete="off">

												</div>
												<div class="form-group col-sm-2">
													<label class="form-label" style="font-size: 9px;">Total</label>
													<input type="number" name="total" class="form-control input-sm" readonly>
												</div>

												<div class="form-group col-sm-1">
													<div class="input-group" style="margin-top: 18px;">
														<button type="button" name="add" id="addBarang" onclick="add_barang()" class="btn btn-secondary btn-block btn-xs" style="width: 60px;">Add</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<div class="row">
						<section class="col-lg-12">
							<div class="card card-dashboard-one">
								<!-- <div class="card-header border c-header">
								</div> -->
								<div class="card-body" id="dataDaftarBarang">


								</div>
							</div>
						</section>
					</div>

					<div class="row">
						<section class="col-md-12 border-top-dashed">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label class="form-label" style="font-size: 9px;"><?= lang('label_subtotal'); ?></label>
										<input type="text" name="subtotal" id="subtotal" class="form-control input-sm" readonly>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="form-label" style="font-size: 9px;"><?= lang('label_discount'); ?></label>
										<input type="number" step="1" name="diskonsub" class="form-control input-sm" autocomplete="off">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label class="form-label" style="font-size: 9px;"><?= lang('label_grandtotal'); ?></label>
										<input type="text" name="grandtotal" class="form-control input-sm" readonly>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group" id="ifkreditthen_bayar_gone">
										<label class="form-label" style="font-size: 9px;"><?= lang('label_pay'); ?></label>
										<input type="number" name="bayar" class="form-control input-sm" autocomplete="off">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group" id="ifkreditthen_kembali_gone">
										<label class="form-label" style="font-size: 9px;">kembalian</label>
										<input type="number" name="kembali" class="form-control input-sm" readonly autocomplete="off">
									</div>
								</div>

							</div>

						</section>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" onclick="selesai()" class="btn btn-primary"><?= lang('label_save'); ?></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><?= lang('label_close'); ?></button>
				</div>
			</div>
		</form>
	</div><!-- modal-dialog -->
</div><!-- modal -->



<div id="modal-manage-pilih-obat" class="modal draggable">
	<!-- modal pilih obat-->
	<div class="modal-dialog modal-xl" role="document">
		<form method="POST" name="form-manage-pilih-obat">
			<div class="modal-content" style="border: 1px solid #ff0000">
				<div class="modal-header">
					<h6 class="modal-title">Pilih data</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="card card-dashboard-one">
					<div class="card-body">
						<table class="table table-bordered table-striped minimize-padding-all" id="dataObat" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%;" cellspacing="0" style="height:40px;">
							<thead>
								<tr>
									<th><?= lang('label_code'); ?></th>
									<th><?= lang('label_name'); ?></th>
									<th><?= lang('label_category'); ?></th>
									<th><?= lang('label_unit'); ?></th>
									<th><?= lang('label_purchase'); ?></th>
									<th><?= lang('label_sell'); ?></th>
									<th><?= lang('label_stock'); ?></th>
									<th><?= lang('label_supplier'); ?></th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="modal-manage-nota" class="modal small" margin="center">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-content-demo"><br><br>
			<h6 class="modal-title" align="center">MEDICLOUD BATAM</h6><br>
			<h1 class="modal-title" align="center">Laporan Pembelian Obat <br>Periode Mei 2021</h1><br>
			<font align="center">No. Izin: 111.222.333.444.555 <br>Komp. Ruko Buana Central Park <br>Block Monroe No. 2, Batam</font>
			<font align="center">---------------------------------------------------------</font>
			<font align="center">Bon 111-222-333-444-555 | Kasir: Rimauli</font>
			<font align="center">---------------------------------------------------------</font>
			<table border="1" id="tableDetailNota" align="center" width="300" cellpadding="4"></table>
			<font align="center">---------------------------------------------------------</font>
			<font align="center">Tgl. <?= date("d-m-Y h.i.s"); ?> V.2021.3.0</font>
			<font align="center">---------------------------------------------------------</font>
			<table border="" align="center" width="300" cellpadding="4" id="tableSummary">
				<tr>
					<td>Total Item</td>
					<td align="center" class="total_item">0</td>
					<td class="text-right"><span class="pull-left">Rp. </span><span class="total_price">0</span></td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td align="center"></td>
					<td class="text-right"><span class="pull-left">Rp. </span><span class="diskonsub">0</span></td>
				</tr>
				<tr>
					<td>Grand Total</td>
					<td align="center"></td>
					<td class="text-right"><span class="pull-left">Rp. </span><span class="grandtotal">0</span></td>
				</tr>
				<tr>
					<td colspan="2">Tunai</td>
					<td class="text-right"><span class="pull-left">Rp. </span><span class="total_bayar_tunai">0</span></td>
				</tr>
				<tr>
					<td colspan="2">Kembalian</td>
					<td class="text-right"><span class="pull-left">Rp. </span><span class="total_kembalian">0</span></td>
				</tr>
				<tr>
					<td colspan="2">PPN</td>
					<td align="right" class="total_ppn">0</td>
				</tr>
			</table>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div><!-- modal-dialog -->
</div><!-- modal -->
<div id="modal-manage-satuan-beli" class="modal">
	<!-- modal satuan obat-->
	<div class="modal-dialog" role="document">
		<form method="POST" name="form-manage-satuan-beli">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Add data</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="form-label"><?= lang('label_unit'); ?></label>
								<input type="text" class="form-control input-sm" name="namaSatuanbeli" id="namaSatuanbeli" autocomplete="off" placeholder="<?= lang('label_unit'); ?>">
							</div>
						</div>
					</div>
					<input type="text" class="hide" name="_idsatuan" value="">
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-satuan-beli" class="btn btn-indigo"><i class="fa fa-save"></i> <?= lang('label_save'); ?></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><?= lang('label_close'); ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
