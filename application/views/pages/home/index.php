
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="images/home/sepeda1.jpg" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">Lights & Lighting</h1>
                            <p>
                                Selections from Featured Suppliers Factory Price
                            </p> 

                        <p class="lead">Dapatkan barang yang Anda pesan atau dapatkan kembali uang Anda dengan Garansi Farid Store. Buat dan jelajahi daftar secara gratis, tanpa biaya tambahan.</p>
                        <div class="d-flex">
                           
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-box-arrow-right"></i>
                                All Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<main role="main" class="container">

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-body">
							Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
							<span class="float-right">
								Urutkan harga: <a href="<?= base_url('shop/sortby/asc') ?>" class="badge badge-primary">Termurah</a> | <a href="<?= base_url('shop/sortby/desc') ?>" class="badge badge-primary">Termahal</a>
								
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<?php foreach ($content as $row) : ?>
					<div class="col-md-6">
						<div class="card mb-3">
							<img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.png") ?>" alt="" class="card-img-top">
							<div class="card-body">
								<h5 class="card-title"><?= $row->product_title ?></h5>
								<p class="card-text"><strong>Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</strong></p>
								<p class="card-text"><?= $row->description ?></p>
								<a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></a>
							</div>
							<div class="card-footer">
								<form action="<?= base_url('cart/add') ?>" method="POST">
									<input type="hidden" name="id_product" value="<?= $row->id ?>">
									<div class="input-group">
										<input type="number" name="qty" value="1" class="form-control">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">Add to cart</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>

			<nav aria-label="Page navigation example">
				<?= $pagination ?>
			</nav>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-header">
							Pencarian
						</div>
						<div class="card-body">
							<form action="<?= base_url('shop/search') ?>" method="POST">
								<div class="input-group">
									<input type="text" name="keyword" class="form-control" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3">
						<div class="card-header">
							Category
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="<?= base_url('home') ?>">Semua kategori</a></li>
							<?php foreach (getCategories() as $category) : ?>
								<li class="list-group-item"><a href="<?= base_url("shop/category/$category->slug") ?>"><?= $category->title ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>