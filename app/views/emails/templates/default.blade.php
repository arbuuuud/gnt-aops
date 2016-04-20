@include('emails.templates.header')

						<!-- EMAIL BODY // -->
						<!--
							The table "emailBody" is the email's container.
							Its width can be set to 100% for a color band
							that spans the width of the page.
						-->
						<table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">

							<!-- MODULE ROW // -->
							<!--
								To move or duplicate any of the design patterns
								in this email, simply move or copy the entire
								MODULE ROW section for each content block.
							-->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<!--
										The centering table keeps the content
										tables centered in the emailBody table,
										in case its width is set to 100%.
									-->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#008E96">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<!--
													The flexible container has a set width
													that gets overridden by the media query.
													Most content tables within can then be
													given 100% widths.
												-->
												<table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td align="center" valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<!--
															The content table is the first element
																that's entirely separate from the structural
																framework of the email.
															-->
															<table border="0" cellpadding="30" cellspacing="0" width="100%">
																<tr>
																	<td align="center" valign="top" class="textContent-main">
																		@if(isset($emailtemplate->content_main_title))
																		<h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">
																			{{$emailtemplate->content_main_title}}
																		</h1>
																		@endif
																		@if(isset($emailtemplate->content_sub_title))
																		<h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;">
																			{{$emailtemplate->content_sub_title}}
																		</h2>
																		@endif
																		@if(isset($emailtemplate->content_desc))
																		<div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">
																			{{$emailtemplate->content_desc}}
																		</div>
																		@endif
																	</td>
																</tr>
															</table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

							<!-- MODULE ROW // -->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td align="center" valign="top" width="500" class="flexibleContainerCell">
															<table border="0" cellpadding="30" cellspacing="0" width="100%">
																<tr>
																	<td align="center" valign="top">

																		<!-- CONTENT TABLE // -->
																		<table border="0" cellpadding="0" cellspacing="0" width="100%">
																			<tr>
																				<td valign="top" class="textContent-main">
																					<div style="font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:3px;color:#5F5F5F;line-height:135%;">
																						@if(isset($emailtemplate->content_body))
																							{{$emailtemplate->content_body}}
																						@endif
																					</div>
																				</td>
																			</tr>
																		</table>
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

							<!-- MODULE DIVIDER // -->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td align="center" valign="top" width="500" class="flexibleContainerCell">
															<table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
																<tr>
																	<td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">

																		<!-- CONTENT TABLE // -->
																		<table border="0" cellpadding="0" cellspacing="0" width="100%">
																			<tr>
																				<td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td>
																			</tr>
																		</table>
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->

							<!-- MODULE ROW // -->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td style="padding-bottom:0;" valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tr>
																	<td align="left" valign="top" class="flexibleContainerBox">
																		<table border="0" cellpadding="0" cellspacing="0" width="90" style="max-width:100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<img src="{{url('img/logo.png')}}" width="73" class="flexibleImageSmall" style="max-width:100%;" alt="Text" title="Text" />
																				</td>
																			</tr>
																		</table>
																	</td>
																	<td align="right" valign="middle" class="flexibleContainerBox">
																		<table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="350" style="max-width:100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Bergabung Dengan GNT Club</h3>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

							<!-- MODULE ROW // -->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td style="padding-top:0;" align="center" valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<table align="left" border="0" cellpadding="0" cellspacing="0" class="flexibleContainer">
																<tr>
																	<td align="left" valign="top" class="textContent">
																		<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;margin-top:10px;color:#5F5F5F;line-height:135%;">
																			<p>Dengan bergabung dengan GNT Club, Anda akan mendapatkan informasi terbaik dan .....</p>
																		</div>
																	</td>
																</tr>
															</table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

							<!-- MODULE ROW // -->
							<tr>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr style="padding-top:0;">
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td style="padding-top:0;" align="center" valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<table border="0" cellpadding="0" cellspacing="0" width="50%" class="emailButton" style="background-color: #008E96;">
																<tr>
																	<td align="center" valign="middle" class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
																		<a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="{{url('register/')}}" target="_blank">
																			Saya Ingin Bergabung!
																		</a>
																	</td>
																</tr>
															</table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

						</table>
						<!-- // END -->

@include('emails.templates.footer')