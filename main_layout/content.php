<?php 
    require_once("./entities/category.class.php");
    require_once("./entities/post.class.php");
    require_once("./entities/tags.class.php");
    require_once("./entities/comments.class.php");
	
    $new_posts = Post::new_post_category(5); // Lấy danh sách bài viết mới nhất
    $img_defaut = "./storage/placeholders/placeholder-image.jpg"; // Ảnh mặc định
	
	// Lấy id danh sách  9 category 
    $categories = Category::list_category(); // Lấy danh sách danh mục
	$idCate01 = $categories[0]["id"]; 	$nameCate01 = $categories[0]["name"];
	$idCate02 = $categories[1]["id"]; 	$nameCate02 = $categories[1]["name"];
	$idCate03 = $categories[2]["id"]; 	$nameCate03 = $categories[2]["name"];
	$idCate04 = $categories[3]["id"]; 	$nameCate04 = $categories[3]["name"];
	$idCate05 = $categories[4]["id"]; 	$nameCate05 = $categories[4]["name"];
	$idCate06 = $categories[5]["id"]; 	$nameCate06 = $categories[5]["name"];
	$idCate07 = $categories[6]["id"]; 	$nameCate07 = $categories[6]["name"];
	$idCate08 = $categories[7]["id"]; 	$nameCate08 = $categories[7]["name"];
	$idCate09 = $categories[8]["id"]; 	$nameCate09 = $categories[8]["name"];
	$idCate10 = $categories[9]["id"]; 	$nameCate10 = $categories[9]["name"];

	// Lấy danh sách thẻ từ khóa
	$tags = Tags::list_tag();

	// Lấy danh sách bài viết
	$postOutstand = Post::ListPostOutstanding();

	// Lấy danh sách bình luận bài viết 
	$comments = Comment::list_comment();

?>
<div class="wrapper">
	<!-- Main Content Section Start -->
	<div class="main-content--section pbottom--30">
		<div class="container">
					<!-- Main Content Start -->
					<div class="main--content">
				<!-- Post Items Start -->
				<div class="post--items post--items-1 pd--30-0">
					<div class="row gutter--15">
						<div class="col-md-6">
							<div class="row gutter--15">
								<?php                         
                                    for($i = 0; $i <= 1 ; $i++){
                                ?>
								<div class="col-xs-6 col-xss-12">
									<!-- Post Item Start -->
									<div class="post--item post--layout-1 post--title-large">
										<div class="post--img">
											<a href="<?php echo $new_posts[$i]["slug"]?>"
												class="thumb"><img
													src="../storage/<?php echo Post::getPostPathImg($new_posts[$i]["id"]) ?>"
													alt=""></a>
											<a href="{{ route('categories.show', $posts_new[$i][0]->category) }}" class="cat"><?php echo Post::getNameCategory($new_posts[$i]["category_id"]) ?></a>

											<a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>
											<div class="post--info">
												<ul class="nav meta">
													<li><a href="javascript:;"><?php echo Post::getNameAuthor($new_posts[$i]["user_id"]) ?></a></li>
													<li><a href="javascript:;"><?php echo  date_create_from_format('Y-m-d H:i:s',$new_posts[$i]["created_at"])->format('d/m/Y') ?></a></li>
												</ul>
												<div class="title">
													<h2 class="h4"><a href="<?php echo $new_posts[$i]["slug"]?>" class="btn-link"><?php echo $new_posts[$i]["title"] ?></a>
													</h2>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</div>
								<?php
                                    }     // Đóng vòng for
                                ?>
						

								<div class="col-sm-12 hidden-sm hidden-xs">
									<!-- Post Item Start -->
									<div class="post--item post--layout-1 post--title-larger">
										<div class="post--img">
											<a href="<?php echo $new_posts[2]["slug"]?>"
												class="thumb"><img
													src="../storage/<?php echo Post::getPostPathImg($new_posts[2]["id"]) ?>"
													style="height:200px" alt=""></a>

											<a href="{{ route('categories.show', $posts_new[2][0]->category) }}" class="cat"><?php echo Post::getNameCategory($new_posts[2]["category_id"]) ?></a>

											<a href="javascript:;" class="icon"><i class="fa fa-fire"></i></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="javascript:;"><?php echo Post::getNameAuthor($new_posts[2]["user_id"]) ?></a></li>
													<li><a href="javascript:;"><?php echo  date_create_from_format('Y-m-d H:i:s',$new_posts[2]["created_at"])->format('d/m/Y') ?></a></li>
												</ul>

												<div class="title">
													<h2 class="h4"><a
															href="<?php echo $new_posts[2]["slug"]?>"
															class="btn-link"><?php echo $new_posts[2]["title"] ?></a></h2>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</div>

							</div>
						</div>

						<div class="col-md-6">
							<!-- Post Item Start -->
							<div class="post--item post--layout-1 post--title-larger">
								<div class="post--img">
									<a href="<?php echo $new_posts[3]["slug"]?>"
										class="thumb"><img src="../storage/<?php echo Post::getPostPathImg($new_posts[3]["id"]) ?>" alt=""></a>

									<a href="{{ route('categories.show', $posts_new[3][0]->category ) }}" class="cat"><?php echo Post::getNameCategory($new_posts[3]["category_id"]) ?></a>

									<a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>

									<div class="post--info">
										<ul class="nav meta">
											<li><a href="javascript:;"><?php echo Post::getNameAuthor($new_posts[3]["user_id"]) ?></a></li>
											<li><a href="javascript:;"><?php echo  date_create_from_format('Y-m-d H:i:s',$new_posts[3]["created_at"])->format('d/m/Y') ?></a></li>
										</ul>

										<div class="title">
											<h2 class="h4"><a
													href="<?php echo $new_posts[3]["slug"]?>"
													class="btn-link"><?php echo $new_posts[3]["title"] ?></a>
											</h2>
										</div>
									</div>
								</div>
							</div>
							<!-- Post Item End -->
						</div>

					</div>
				</div>
				<!-- Post Items End -->
			</div>
			<!-- Main Content End -->


			<div class="row">
				<!-- Main Content Start -->
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="row">
							<!-- World News Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo $nameCate01 ?></h2>
								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
								
									
										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate01)[0]["slug"] ?>"
														class="thumb"><img src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate01)[0]["id"]) ?>"
															alt=""></a>

													<a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"><?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate01)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"><?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate01)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate01)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate01)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										<?php for($i = 1; $i <= 4; $i++) { ?>
											<?php if( $i == 1 || $i == 3 ) { ?>
											<li class="col-xs-12">
												<!-- Divider Start -->
												<hr class="divider">
												<!-- Divider End -->
											</li>
											<!-- Đóng hàm if -->
											<?php } ?> 
								
											<li class="col-xs-6">
												<!-- Post Item Start -->

												<div class="post--item post--layout-2">
													<div class="post--img">
														<a href="<?php echo Post::ListPostToCategory($idCate01)[$i]["slug"] ?>"
															class="thumb"><img
																src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate01)[$i]["id"]) ?>"
																alt=""></a>

														<div class="post--info">
															<ul class="nav meta">
																<li><a href="javascript:;"><?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate01)[$i]["user_id"]) ?></a></li>
																<li><a href="javascript:;"><?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate01)[$i]["created_at"])->format('d/m/Y') ?></a></li>
															</ul>

															<div class="title">
																<h3 class="h4"><a
																		href="<?php echo Post::ListPostToCategory($idCate01)[$i]["slug"] ?>"
																		class="btn-link"><?php echo Post::ListPostToCategory($idCate01)[$i]["title"] ?></a>
																</h3>
															</div>
														</div>
													</div>
												</div>
												<!-- Post Item End -->
											</li>
										<?php } ?>
									</ul>

								</div>
								<!-- Post Items End -->
							</div>
							<!-- World News End -->

							<!-- Technology Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo $nameCate02 ?></h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
								
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate02)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate02)[0]["id"]) ?>"
															alt=""></a>
												
													<a href="javascript:;" class="icon"><i class="fa fa-flash"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate02)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate02)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate02)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate02)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										<?php for($i = 1; $i <= 5; $i++) {?>
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate02)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate02)[$i]["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate02)[$i]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate02)[$i]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate02)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate02)[$i]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
									<?php } ?>

									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Technology End -->

							<!-- Finance Start -->
							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo  $nameCate03  ?></h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<li class="col-md-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate03)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate03)[0]["id"]) ?>"
															alt=""></a>
													<a href="{{ route('categories.show', $post_category_home2[0]->category) }}" class="cat"><?php echo $nameCate03 ?></a>
													<a href="javascript:;" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate03)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate03)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate03)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate03)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->

											<hr class="mar_bottom15 ">

											<ul class="list_news_show_home">
												<?php for($i = 4; $i <= 6; $i++) { ?>

													<?php if($i!=6) {?>
														<li class="boder_link_show_home">
															<h3 class="h3"><a href="<?php echo Post::ListPostToCategory($idCate03)[$i]["slug"] ?>"><?php echo Post::ListPostToCategory($idCate03)[$i]["title"] ?></a></h3>
														</li>
													<?php } ?> 

													<?php if($i==6) {?>
														<li>
															<h3 class="h3"><a href="<?php echo Post::ListPostToCategory($idCate03)[$i]["slug"] ?>"><?php echo Post::ListPostToCategory($idCate03)[$i]["title"] ?></a></h3>
														</li>
													<?php } ?>

												<?php } ?>
											</ul>

										</li>

										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>
												<?php for($i = 1; $i <= 4; $i++) { ?>
													<?php if($i==3) {?>
															<li class="col-xs-12">
																<!-- Divider Start -->
																<hr class="divider">
																<!-- Divider End -->
															</li>
													<?php } ?>
													
													<li class="col-xs-6">
														<!-- Post Item Start -->
														<div class="post--item post--layout-2">
															<div class="post--img">
																<a href="<?php echo Post::ListPostToCategory($idCate03)[$i]["slug"] ?>"
																	class="thumb"><img 
																		src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate03)[$i]["id"]) ?>"
																		alt=""></a>

																<div class="post--info">
																	<ul class="nav meta">
																		
																		<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate03)[$i]["user_id"]) ?></a></li>
																		<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate03)[$i]["created_at"])->format('d/m/Y') ?></a></li>
																	</ul>

																	<div class="title">
																		<h3 class="h4"><a
																				href="<?php echo Post::ListPostToCategory($idCate03)[$i]["slug"] ?>"
																				class="btn-link"><?php echo Post::ListPostToCategory($idCate03)[$i]["title"] ?></a></h3>
																	</div>
																</div>
															</div>
														</div>
														<!-- Post Item End -->
													</li>

												<?php } ?>
											</ul>
										</li>
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Finance End -->

							<!-- Politics Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo $nameCate04  ?></h2>
								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate04)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate04)[0]["id"]) ?>"
															alt=""></a>
													<a href="{{ route('categories.show', $post_category_home3[0]->category) }}"
														class="cat"> <?php echo $nameCate04  ?></a>
													<a href="{{ route('categories.show', $post_category_home3[0]->category) }}" class="icon"><i class="fa fa-fire"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate04)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate04)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a href="<?php echo Post::ListPostToCategory($idCate04)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate04)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										<?php for($i = 1; $i <= 4; $i++) { ?>
										<?php if($i==1 || $i == 3) { ?>
											<li class="col-xs-12">
												<!-- Divider Start -->
												<hr class="divider">
												<!-- Divider End -->
											</li>
											<?php } ?>
											<li class="col-xs-6">
												<!-- Post Item Start -->
												<div class="post--item post--layout-2">
													<div class="post--img">
														<a href="<?php echo Post::ListPostToCategory($idCate04)[$i]["slug"] ?>"
															class="thumb"><img
																src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate04)[$i]["id"]) ?>"
																alt=""></a>

														<div class="post--info">
															<ul class="nav meta">
																<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate04)[$i]["user_id"]) ?></a></li>
																<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate04)[$i]["created_at"])->format('d/m/Y') ?></a></li>
															</ul>

															<div class="title">
																<h3 class="h4"><a
																		href="<?php echo Post::ListPostToCategory($idCate04)[$i]["slug"] ?>"
																		class="btn-link"><?php echo Post::ListPostToCategory($idCate04)[$i]["title"] ?></a>
																</h3>
															</div>
														</div>
													</div>
												</div>
												<!-- Post Item End -->
											</li>
										<?php } ?>
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Politics End -->

							<!-- Sports Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo $nameCate05 ?></h2>
								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate05)[0]["slug"] ?>"
														class="thumb"><img src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate05)[0]["id"]) ?>"
															alt=""></a>
													<a href="{{ route('categories.show', $post_category_home4[0]->category) }}"
														class="cat"><?php echo $nameCate05 ?></a>
													<a href="{{ route('categories.show', $post_category_home4[0]->category) }}" class="icon"><i class="fa fa-eye"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate05)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate05)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate05)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate05)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>

										<?php for($i = 1; $i <= 5; $i++) { ?>
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate05)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate05)[$i]["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate05)[$i]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate05)[$i]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate05)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate05)[$i]["title"] ?></a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php } ?>

									</ul>

								</div>
								<!-- Post Items End -->
							</div>
							<!-- Sports End -->
						</div>
					</div>
				</div>
				<!-- Main Content End -->

				<!-- Main Sidebar Start -->
				<div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
					<div class="sticky-content-inner">
						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">Tin tức nổi bật</h2>
								<i class="icon fa fa-newspaper-o"></i>
							</div>

							<!-- List Widgets Start -->
							<div class="list--widget list--widget-1">
								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<?php foreach($postOutstand as $item) {?>
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="<?php echo $item["slug"]?>"
														class="thumb"><img width = "120"
															src="../storage/<?php echo Post::getPostPathImg($item["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"><?php echo Post::getNameAuthor($item["user_id"]) ?></a></li>
															<li><a  href="<?php echo $post["slug"]?>#comments_all"><i class="fa fm fa-comments"></i><?php echo COUNT(Comment::getCommentPost($item["id"])) ?></a></li>
                                       						<li><span><i class="fa fm fa-eye"></i><?php echo $item["views"] ?></span></li>
														</ul>

														<div class="title">
															<h3  class="h4">
																<a href="<?php echo $item["slug"]?>" class="btn-link"><?php echo $item["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php } ?>
									
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- List Widgets End -->
						</div>
						<!-- Widget End -->

						<!-- Bắt đầu Từ khóa -->
						<div class="widget">
							<div class="widget--title  " data-ajax="tab">
								<h2 class="h4">Từ khóa</h2>
							</div>
							<div class="list--widget list--widget-1" data-ajax-content="outer">
								<!-- Post Items Start -->
								<div class="post--items post--items-3">
									<ul style="padding:20px" class="nav sidebar" data-ajax-content="inner">
										<div class="side">
											<div class="block-26">
												<ul>
													<?php for($i = 0; $i< 30;  $i++) {?>
														<li><a href=""><?php echo $tags[$i]["name"] ?></a></li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</ul>
								</div>
							</div>
						</div>
						<!-- Kết thúc từ khóa -->

						<!-- Widget Start -->
						<div class="widget">
							<!-- Ad Widget Start -->
							<div class="ad--widget--banner">
								<div class="row">
									<div class="col-sm-12">
										<a
											href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
											<img src="../public/kcnew/frontend/img/ads-img/banner_quangcao1.png" alt="">
										</a>
									</div>
								</div>
							</div>
							<!-- Ad Widget End -->
						</div>
						<!-- Widget End -->

						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">Kết nối với chúng tôi</h2>
								<i class="icon fa fa-share-alt"></i>
							</div>

							<!-- Social Widget Start -->
							<div class="social--widget style--2">
								<ul class="nav row gutter--20">
									<li class="col-md-12 facebook">
										<a href="https://www.facebook.com/people/Anh-Tuan/100007007238964">
											<span class="icon">
												<i class="fa fa-facebook"></i>
												<span>Share</span>
											</span>

											<span class="text">
												<span>Facebook</span>
												<span>3.12 k</span>
											</span>
										</a>
									</li>

									<li class="col-md-12 twitter">
										<a href="https://www.facebook.com/people/Anh-Tuan/100007007238964">
											<span class="icon">
												<i class="fa fa-twitter"></i>
												<span>Tweet</span>
											</span>

											<span class="text">
												<span>Twitter</span>
												<span>869</span>
											</span>
										</a>
									</li>

									<li class="col-md-12 google-plus">
										<a href="https://www.facebook.com/people/Anh-Tuan/100007007238964">
											<span class="icon">
												<i class="fa fa-google-plus"></i>
												<span>Share</span>
											</span>

											<span class="text">
												<span>Google+</span>
												<span>639</span>
											</span>
										</a>
									</li>


								</ul>
							</div>
							<!-- Social Widget End -->
						</div>
						<!-- Widget End -->

						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">Quảng cáo</h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>

							<!-- Ad Widget Start -->
							<div class="ad--widget--banner">
								<a href="https://mwc.com.vn/products/giay-sandal-nu-mwc-nusd--2887?c=N%C3%82U">
									<img src="../public/kcnew/frontend/img/ads-img/banner_quangcao.png" alt="">
								</a>
							</div>
							<!-- Ad Widget End -->
						</div>
						<!-- Widget End -->
					</div>
				</div>
				<!-- Main Sidebar End -->
			</div>

			<!-- Main Content Start -->
			<div class="main--content pd--30-0">
				<!-- Post Items Title Start -->
				<div class="post--items-title" data-ajax="tab">
					<h2 class="h4">	<?php echo $nameCate06 ?></h2>
				</div>
				<!-- Post Items Title End -->

				<!-- Post Items Start -->
				<div class="post--items post--items-4" data-ajax-content="outer">
					<ul class="nav row" data-ajax-content="inner">
						<li class="col-md-8">
							<!-- Post Item Start -->
							<div class="post--item post--layout-1 post--type-video post--title-large">
								<div class="post--img">
									<a href="<?php echo Post::ListPostToCategory($idCate06)[0]["slug"] ?>" class="thumb"><img
											src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate06)[0]["id"]) ?>" alt=""></a>
									<a href="{{ route('categories.show', $post_category_home5[0]->category) }}" class="cat"><?php echo $nameCate06 ?></a>
									<a href="{{ route('categories.show', $post_category_home5[0]->category) }}" class="icon"><i class="fa fa-eye"></i></a>

									<div class="post--info">
										<ul class="nav meta">
											<li><a href="javascript:;"><?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate06)[0]["user_id"]) ?></a></li>
											<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate06)[0]["created_at"])->format('d/m/Y') ?></a></li>
										</ul>

										<div class="title">
											<h2 class="h4"><a
													href="<?php echo Post::ListPostToCategory($idCate06)[0]["slug"] ?>"
													class="btn-link"><?php echo Post::ListPostToCategory($idCate06)[0]["title"] ?></a></h2>
										</div>
									</div>
								</div>
							</div>
							<!-- Post Item End -->

							<!-- Divider Start -->
							<hr class="divider hidden-md hidden-lg">
							<!-- Divider End -->
						</li>
						<li class="col-md-4">
							<ul class="nav">

							<?php for($i = 1; $i <= 5; $i++) { ?>
								<li>
									<!-- Post Item Start -->
									<div class="post--item post--type-audio post--layout-3">
										<div class="post--img">
											<a href="<?php echo Post::ListPostToCategory($idCate06)[$i]["slug"] ?>"
												class="thumb"><img
													src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate06)[$i]["id"]) ?>"
													alt=""></a>

											<div class="post--info">
												<ul class="nav meta">
													<li><a href="javascript:;"><?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate06)[$i]["user_id"]) ?></a></li>
													<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate06)[$i]["created_at"])->format('d/m/Y') ?></a></li>
												</ul>

												<div class="title">
													<h3 class="h4"><a
															href="<?php echo Post::ListPostToCategory($idCate06)[$i]["slug"] ?>"
															class="btn-link"><?php echo Post::ListPostToCategory($idCate06)[$i]["title"] ?></a></h3>
												</div>
											</div>
										</div>
									</div>
									<!-- Post Item End -->
								</li>
								<?php } ?>
							
							</ul>
						</li>
					</ul>


				</div>
				<!-- Post Items End -->
			</div>
			<!-- Main Content End -->

			<!-- Advertisement Start -->
			<div class="ad--space pd--30-0">
				<a href="https://burine.vn/">
					<img src="{{ asset('kcnew/frontend/img/ads-img/970x90_banner_burine.png') }}" alt="" class="center-block">
				</a>
			</div>
			<!-- Advertisement End -->

			<div class="row">
				<!-- Main Content Start -->
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="row">
							<!-- Health and fitness Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">	<?php echo $nameCate07 ?></h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-3" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate07)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate07)[0]["id"]) ?>" alt=""></a>
													<a href="{{ route('categories.show', $post_category_home6[0]->category) }}"
														class="cat">	<?php echo $nameCate07 ?></a>
													<a href="{{ route('categories.show', $post_category_home6[0]->category) }}" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate07)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate07)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate07)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate07)[0]["title"] ?></a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php for($i = 1; $i <= 4; $i++) { ?>
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate07)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate07)[$i]["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate07)[$i]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate07)[$i]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate07)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate07)[$i]["title"] ?></a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php } ?>
										
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- Health and fitness End -->

							<!-- Lifestyle Start -->
							<div class="col-md-6 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo $nameCate08 ?></h2>


								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">

										<li class="col-xs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate08)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate08)[0]["id"]) ?>"
															alt=""></a>
													<a href="{{ route('categories.show', $post_category_home7[0]->category) }}"
														class="cat"><?php echo $nameCate08 ?></a>
													<a href="{{ route('categories.show', $post_category_home7[0]->category) }}" class="icon"><i class="fa fa-heart-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate08)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate08)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate08)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate08)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										
										</li>
										<?php for($i = 1; $i <= 4; $i++) { ?>
											<?php if($i === 3 || $i === 1) {?>
											<li class="col-xs-12">
												<!-- Divider Start -->
												<hr class="divider">
												<!-- Divider End -->
											</li>
											<?php } ?>
										<li class="col-xs-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate08)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate08)[$i]["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate08)[$i]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate08)[$i]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate08)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate08)[$i]["title"] ?></a></h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php } ?>
									</ul>

								</div>
								<!-- Post Items End -->
							</div>
							<!-- Lifestyle End -->

							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo $nameCate09 ?></h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav row" data-ajax-content="inner">
										<li class="col-md-6">
											<!-- Post Item Start -->
											<div class="post--item post--layout-2">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate09)[0]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate08)[0]["id"]) ?>" alt="">
													</a>
													<a href="{{ route('categories.show', $post_category_home8[0]->category) }}" class="cat"><?php echo $nameCate09 ?></a>
													<a href="{{ route('categories.show', $post_category_home8[0]->category) }}" class="icon"><i class="fa fa-star-o"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate08)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate08)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h3 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate09)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate08)[0]["title"] ?></a>
															</h3>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->

											<hr class="mar_bottom15 ">

											<ul class="list_news_show_home">
												<?php for($i = 3; $i <= 5; $i++) { ?>
													<?php if($i!=5) {?>
														<li class="boder_link_show_home">
															<h3 class="h3"><a
																	href="<?php echo Post::ListPostToCategory($idCate09)[$i]["slug"] ?>"><?php echo Post::ListPostToCategory($idCate09)[$i]["title"] ?></a></h3>
														</li>
													<?php } ?>

													<?php if($i==5) {?>
														<li>
															<h3 class="h3"><a
																	href="<?php echo Post::ListPostToCategory($idCate09)[$i]["slug"] ?>"><?php echo Post::ListPostToCategory($idCate09)[$i]["title"] ?></a></h3>
														</li>
													<?php } ?>
												<?php } ?>
											</ul>
										</li>
										<li class="col-md-6">
											<ul class="nav row">
												<li class="col-xs-12 hidden-md hidden-lg">
													<!-- Divider Start -->
													<hr class="divider">
													<!-- Divider End -->
												</li>
												<?php for($i = 1; $i <= 4; $i++) { ?>
													<?php if($i==3) {?>
														<li class="col-xs-12">
															<!-- Divider Start -->
															<hr class="divider">
															<!-- Divider End -->
														</li>
														<?php } ?>
													<li class="col-xs-6">
														<!-- Post Item Start -->
														<div class="post--item post--layout-2">
															<div class="post--img">
																<a href="<?php echo Post::ListPostToCategory($idCate09)[$i]["slug"] ?>"
																	class="thumb"><img
																		src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate09)[$i]["id"]) ?>"
																		alt=""></a>

																<div class="post--info">
																	<ul class="nav meta">
																		<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate09)[$i]["user_id"]) ?></a></li>
																		<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate09)[$i]["created_at"])->format('d/m/Y') ?></a></li>
																	</ul>

																	<div class="title">
																		<h3 class="h4"><a
																				href="<?php echo Post::ListPostToCategory($idCate09)[$i]["slug"] ?>"
																				class="btn-link"><?php echo Post::ListPostToCategory($idCate09)[$i]["title"] ?></a></h3>
																	</div>
																</div>
															</div>
														</div>
														<!-- Post Item End -->
													</li>

												<?php } ?>
											
											</ul>
										</li>
									</ul>


								</div>
								<!-- Post Items End -->
							</div>

							<!-- Photo Gallery Start -->
							<div class="col-md-12 ptop--30 pbottom--30">
								<!-- Post Items Title Start -->
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4"><?php echo $nameCate10 ?></h2>

								</div>
								<!-- Post Items Title End -->

								<!-- Post Items Start -->
								<div class="post--items post--items-1" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
										<li class="col-md-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1 post--title-large">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate10)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate10)[0]["id"]) ?>"
															alt=""></a>
													<a href="{{ route('categories.show', $post_category_home9[0]->category) }}"
														class="cat"><?php echo $nameCate10 ?></a>
													<a href="{{ route('categories.show', $post_category_home9[0]->category) }}" class="icon"><i class="fa fa-eye"></i></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate10)[0]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate10)[0]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title text-xxs-ellipsis">
															<h2 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate10)[0]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate10)[0]["title"] ?></a></h2>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										
									<?php for($i = 1; $i <= 3; $i++) { ?>
									
										<li class="col-md-4 col-xs-6 col-xxs-12">
											<!-- Post Item Start -->
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="<?php echo Post::ListPostToCategory($idCate10)[$i]["slug"] ?>"
														class="thumb"><img
															src="../storage/<?php echo Post::getPostPathImg(Post::ListPostToCategory($idCate10)[$i]["id"]) ?>"
															alt=""></a>

													<div class="post--info">
														<ul class="nav meta">
															<li><a href="javascript:;"> <?php echo Post::getNameAuthor(Post::ListPostToCategory($idCate10)[$i]["user_id"]) ?></a></li>
															<li><a href="javascript:;"> <?php echo  date_create_from_format('Y-m-d H:i:s',Post::ListPostToCategory($idCate10)[$i]["created_at"])->format('d/m/Y') ?></a></li>
														</ul>

														<div class="title">
															<h2 class="h4"><a
																	href="<?php echo Post::ListPostToCategory($idCate10)[$i]["slug"] ?>"
																	class="btn-link"><?php echo Post::ListPostToCategory($idCate10)[$i]["title"] ?></a></h2>
														</div>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php } ?>
									</ul>

								</div>
								<!-- Post Items End -->
							</div>
							<!-- Photo Gallery End -->
						</div>
					</div>
				</div>
				<!-- Main Content End -->

				<!-- Main Sidebar Start -->
				<div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
					<div class="sticky-content-inner">
						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title" data-ajax="tab">
								<h2 class="h4">Bình chọn</h2>

								<div class="nav">
									<a href="javascript:;" class="prev btn-link" data-ajax-action="load_prev_poll_widget">
										<i class="fa fa-long-arrow-left"></i>
									</a>

									<span class="divider">/</span>

									<a href="javascript:;" class="next btn-link" data-ajax-action="load_next_poll_widget">
										<i class="fa fa-long-arrow-right"></i>
									</a>
								</div>
							</div>

							<!-- Poll Widget Start -->
							<div class="poll--widget" data-ajax-content="outer">
								<ul class="nav" data-ajax-content="inner">
									<li class="title">
										<h3 class="h4">
											Theo bạn thì giải đội bóng nào sẽ vô địch WoldCup 2022 ?</h3>
									</li>

									<li class="options">
										<form action="javascript:;">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-1">
													<img src="../public/kcnew/frontend/img/Flag_barzill.png" alt="Brasil" srcset="">
													<span>Brasil</span>
												</label>

												<p>55%<span style="width: 55%;"></span></p>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="../public/kcnew/frontend/img/Flag_Agrennal.png" alt="Brasil" srcset="">
													<span>Argentina</span>
												</label>

												<p>28%<span style="width: 28%;"></span></p>
											</div>

											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="../public/kcnew/frontend/img/Flag_tay_ban_nha.png" alt="Brasil" srcset="">
													<span>Tây Ban Nha</span>
												</label>

												<p>12%<span style="width: 12%;"></span></p>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="option-2">
													<img src="../public/kcnew/frontend/img/Flag_bo-dao-nha.png" alt="Brasil" srcset="">
													<span>Bồ Đào Nha</span>
												</label>

												<p>05%<span style="width: 05%;"></span></p>
											</div>

											<button type="submit" class="btn btn-primary">Vote Ngay</button>
										</form>
									</li>
								</ul>

								<!-- Preloader Start -->
								<div class="preloader bg--color-0--b" data-preloader="1">
									<div class="preloader--inner"></div>
								</div>
								<!-- Preloader End -->
							</div>
							<!-- Poll Widget End -->
						</div>
						<!-- Widget End -->

						<!-- Widget Start -->
						<div class="widget">
							<div class="widget--title" data-ajax="tab">
								<h2 class="h4">Ý KIẾN NGƯỜI ĐỌC</h2>
							</div>

							<!-- List Widgets Start -->
							<div class="list--widget list--widget-2" data-ajax-content="outer">
								<!-- Post Items Start -->
								<div class="post--items post--items-3">
									<ul class="nav" data-ajax-content="inner">
										<?php foreach($comments  as $comment) { ?>
										<li>
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<span class="thumb">
                                                        <img style="margin: auto; background-size: cover ;  width: 60px; height: 60px;   background-image: url(../storage/<?php echo Comment::getCommentPathImg($comment["user_id"]) ?>)"  alt="">
                                                    </span>

													<div class="post--info">
														<div class="title">
															<h3 class="h4"><a href="javascript:;"><?php echo $comment["the_comment"]?></a> </h3>
														</div>

														<ul class="nav meta">
															<li><span> <?php echo Comment::getUserName($comment["user_id"])?>
																</span></li>
															<li><span><?php echo  date_create_from_format('Y-m-d H:i:s', $comment["created_at"])->format('d/m/Y') ?></span></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
										<?php }?>
									
									</ul>


								</div>
								<!-- Post Items End -->
							</div>
							<!-- List Widgets End -->
						</div>
						<!-- Widget End -->

					</div>
				</div> <!-- Main Sidebar End -->
			</div>

		</div>
	</div>
	<!-- Main Content Section End -->

</div>