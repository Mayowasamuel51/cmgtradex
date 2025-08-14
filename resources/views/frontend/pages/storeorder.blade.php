	<div class="container mt-5">
									<!-- Place an Order Title -->
									<h2 class="font-weight-bold mb-4 text-center">ASK FOR QUOTE</h2>

									<div class="container py-5">

										<div class="container py-5">
							

											@php
											$products = [
											['items' => [['name' => '25KG STORAGE SYSTEM', 'price' => 499000], ['name' => '35KG STORAGE SYSTEM', 'price' => 575000], ['name' => '50KG STORAGE SYSTEM', 'price' => 649000]]],
											['items' => [['name' => 'MGC MUMAG 2-Burner Table Top Gas Cooker (with Oven)', 'price' => 720000]]],
											['items' => [['name' => 'MGC MUMAG 4-Burner Table Top Gas Cooker', 'price' => 335000], ['name' => 'MGC MUMAG 3-Burner Table Top Gas Cooker', 'price' => 300000], ['name' => 'MGC MUMAG 2-Burner Table Top Gas Cooker', 'price' => 190000]]],
											['items' => [['name' => 'MGC MUMAG 5-Burner Table Top Gas Cooker', 'price' => 370000]]]
											];
											@endphp

											<form id="orderForm" action="{{ route('submit-order') }}" method="POST" onsubmit="return prepareOrderData()">
												@csrf
												<div class="row justify-content-center g-4">
													@foreach($products as $product)
													<div class="col-md-4 col-sm-6 d-flex">
														<div class="card shadow-sm w-100 h-100">
															<div class="card-body text-center">
																@foreach($product['items'] as $item)
																<div class="mb-3">
																	<h6 class="mb-1 fw-semibold">{{ $item['name'] }}</h6>
																	<span class="badge bg-success">₦{{ number_format($item['price']) }}</span>
																	<input type="number" class="form-control quantity mt-2"
																		min="0"
																		placeholder="Qty"
																		data-price="{{ $item['price'] }}"
																		data-name="{{ $item['name'] }}">
																</div>
																@endforeach
															</div>
														</div>
													</div>
													@endforeach
												</div>

												<div class="text-center mt-4">
													<button type="button" class="btn btn-primary" onclick="generateInvoice()"> Oder QUOTE</button>
												</div>

												<div class="mt-5" id="invoiceSection" style="display:none">
													<h4 class="fw-bold">Invoice Summary</h4>
													<ul class="list-group mb-3" id="invoiceList"></ul>
													<h5>Total: <span id="invoiceTotal"></span></h5>

													<!-- Hidden inputs to store generated values -->
													<textarea name="itemList" id="hiddenItemList" class="form-control" hidden></textarea>
													<input type="hidden" name="totalPrice" id="hiddenPrice">

													<!-- Customer Info -->
													<div class="form-group mt-4">
														<label>Name:</label>
														<input type="text" name="name" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Email:</label>
														<input type="email" name="email" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Phone:</label>
														<input type="number" name="phone" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Company Address:</label>
														<input type="text" name="companyAddress" class="form-control" required>
													</div>

													<div class="text-center mt-3">
														<button type="submit" class="btn btn-success">Submit Order</button>
													</div>
												</div>
											</form>
										</div>


									</div>
								</div>