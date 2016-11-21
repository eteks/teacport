<?phpinclude ('include/header.php');?><?php include('include/menus.php'); ?><section class="job-breadcrumb">	<div class="container">		<div class="row">			<div class="col-md-6 col-sm-7 co-xs-12 text-left">				<h3>Edit Your Profile</h3>			</div>			<div class="col-md-6 col-sm-5 co-xs-12 text-right">				<div class="bread">					<ol class="breadcrumb">						<li>							<a href="company-dashboard-edit-profile.html#">Home</a>						</li>						<li>							<a href="company-dashboard-edit-profile.html#">Dashboard</a>						</li>						<li class="active">							Edit Profile						</li>					</ol>				</div>			</div>		</div>	</div></section><section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Edit Profile</p>                            </div>                            <div class="profile-edit">	                            <form id="form-school" class="form-horizontal" action="" name="" autocomplete="false" method="post" accept-charset="utf-8">		                	           <div id="provider_upload" class="form-group">											<label class="col-sm-2">Upload Logo: <sup class="alert">*</sup> </label>	                                        <div class="col-sm-8">	                                        	<div class="input-group image-preview">	                                            	<input type="text" class="form-control image-preview-filename" placeholder="Upload Profile Image" disabled="disabled">	                                            	<span class="input-group-btn">	                                   					<button type="button" class="btn btn-default image-preview-clear" style="display:none;">	                                        				<span class="glyphicon glyphicon-remove"></span> Clear	                                            		</button>		                                            	<div class="btn btn-default image-preview-input">		                                               	 	<span class="glyphicon glyphicon-folder-open"></span>		                                               		 <span class="image-preview-input-title">Browse</span>		                                                	<input type="file" accept="file_extension" name="input-file-preview" />		                                            	</div>		                                        	</span>		                                    	</div>		                                    </div>		                                    </div>	                                    <div class="form-group">											<label class="col-sm-4" for="address-line1">Name : </label>											<div class="col-sm-8">												<input id="" class="form-control" maxlength="30" name="" size="40" value="" placeholder="Institution Name" type="text">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" for="address-line1">Address Line1 : </label>											<div class="col-sm-8">												<input id="address-line1" class="form-control" maxlength="30" name="address-line1" size="40" value="" placeholder="Building No / Road / Street" type="text">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" for="address-line2">Address Line2 : </label>											<div class="col-sm-8">												<input id="address-line2" class="form-control" maxlength="30" name="address-line2" size="40" value="" placeholder="Locality / Area / Village" type="text">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" for="address-line3">Address Line3 : </label>											<div class="col-sm-8">												<input id="address-line2" class="form-control" maxlength="30" name="address-line3" size="40" value="" placeholder="Taluk / City" type="text">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" for="">District : </label>											<div class="col-sm-4">												<select id="add_district" class="form-control" name="add_district" onchange="">													<option selected="selected" value=""> Select District </option>													<option value="0">Other than Tamilnadu</option>													<option value="1">Chennai</option>													<option value="2">Coimbatore</option>													<option value="3">Cuddalore</option>													<option value="4">Dharmapuri</option>													<option value="5">Dindigul</option>													<option value="6">Erode</option>													<option value="7">Kancheepuram</option>													<option value="8">Karur</option>													<option value="9">Madurai</option>													<option value="10">Nagapattinam</option>													<option value="11">Namakkal</option>													<option value="12">Udhagamandalam</option>													<option value="13">Perambalur</option>													<option value="14">Pudukkottai</option>													<option value="15">Ramanathapuram</option>													<option value="16">Salem</option>													<option value="17">Sivaganga</option>													<option value="18">Thanjavur</option>													<option value="19">Theni</option>													<option value="20">Tiruvallur</option>													<option value="21">Thiruvannamalai</option>													<option value="22">Tiruvarur</option>													<option value="23">Tuticorin</option>													<option value="24">Tiruchirappalli</option>													<option value="25">Tirunelvelli</option>													<option value="26">Vellore</option>													<option value="27">Villupuram</option>													<option value="28">Virudhunagar</option>													<option value="29">Ariyalur</option>													<option value="30">Krishnagiri</option>													<option value="31">Tiruppur</option>													<option value="32">Kanyakumari</option>												</select>											</div>											<div class="col-sm-4">												<input id="add_district_oth" class="form-control" disabled="disabled" maxlength="35" name="add_district_oth" onkeypress="" value="" placeholder="Other District" type="text">											</div>										</div>										<div class="form-group">											<label class="col-sm-4">Institution Type :</label>											<div class="col-sm-8">												<select class="form-control">													<option value="">Select Institution Type</option>													<option value="">School</option>												    <option value="">College</option>												    <option value="">University</option>												</select>   											</div>										</div>										<span class="space-6"></span>										<div class="form-group">											<label class="col-sm-4" for="">Registrant Name : </label>											<div class="col-sm-8">												<input id="firstname" class="form-control" maxlength="30" name="firstname" size="40" required="" onkeypress="return alphadothyphen(event)" value="" placeholder="Full Name">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" for="designation">Registrant Designation : </label>											<div class="col-sm-8">												<input id="designation" class="form-control" maxlength="30" name="designation" size="40" required="" onkeypress="return alphadothyphen(event)" value="" placeholder="ex. Principal / Correspondent">											</div>										</div>										<div class="form-group">											<label class="col-sm-4" form="dob">Date of Birth<span class="alert">*</span></label>											<div class="col-sm-3">											<select class="form-control" name="dob_yrs">											<option selected="selected" value=""> Year </option>											<option value="1935">1935</option>											<option value="1936">1936</option>											<option value="1937">1937</option>											<option value="1938">1938</option>											<option value="1939">1939</option>											<option value="1940">1940</option>											<option value="1941">1941</option>											<option value="1942">1942</option>											<option value="1943">1943</option>											<option value="1944">1944</option>											<option value="1945">1945</option>											<option value="1946">1946</option>											<option value="1947">1947</option>											<option value="1948">1948</option>											<option value="1949">1949</option>											<option value="1950">1950</option>											<option value="1951">1951</option>											<option value="1952">1952</option>											<option value="1953">1953</option>											<option value="1954">1954</option>											<option value="1955">1955</option>											<option value="1956">1956</option>											<option value="1957">1957</option>											<option value="1958">1958</option>											<option value="1959">1959</option>											<option value="1960">1960</option>											<option value="1961">1961</option>											<option value="1962">1962</option>											<option value="1963">1963</option>											<option value="1964">1964</option>											<option value="1965">1965</option>											<option value="1966">1966</option>											<option value="1967">1967</option>											<option value="1968">1968</option>											<option value="1969">1969</option>											<option value="1970">1970</option>											<option value="1971">1971</option>											<option value="1972">1972</option>											<option value="1973">1973</option>											<option value="1974">1974</option>											<option value="1975">1975</option>											<option value="1976">1976</option>											<option value="1977">1977</option>											<option value="1978">1978</option>											<option value="1979">1979</option>											<option value="1980">1980</option>											<option value="1981">1981</option>											<option value="1982">1982</option>											<option value="1983">1983</option>											<option value="1984">1984</option>											<option value="1985">1985</option>											<option value="1986">1986</option>											<option value="1987">1987</option>											<option value="1988">1988</option>											<option value="1989">1989</option>											<option value="1990">1990</option>											<option value="1991">1991</option>											<option value="1992">1992</option>											<option value="1993">1993</option>											<option value="1994">1994</option>											<option value="1995">1995</option>											<option value="1996">1996</option>											<option value="1997">1997</option>											<option value="1998">1998</option>											<option value="1999">1999</option>											<option value="2000">2000</option>											</select>										</div>										<div class="col-sm-3">											<select class="form-control" name="dob_month">											<option selected="selected" value=""> Month </option>											<option value="01">Jan</option>											<option value="02">Feb</option>											<option value="03">Mar</option>											<option value="04">Apr</option>											<option value="05">May</option>											<option value="06">Jun</option>											<option value="07">Jul</option>											<option value="08">Aug</option>											<option value="09">Sep</option>											<option value="10">Oct</option>											<option value="11">Nov</option>											<option value="12">Dec</option>											</select>										</div>										<div class="col-sm-2">											<select class="form-control" name="dob_day">											<option selected="selected" value=""> Date </option>											<option value="01">1</option>											<option value="02">2</option>											<option value="03">3</option>											<option value="04">4</option>											<option value="05">5</option>											<option value="06">6</option>											<option value="07">7</option>											<option value="08">8</option>											<option value="09">9</option>											<option value="10">10</option>											<option value="11">11</option>											<option value="12">12</option>											<option value="13">13</option>											<option value="14">14</option>											<option value="15">15</option>											<option value="16">16</option>											<option value="17">17</option>											<option value="18">18</option>											<option value="19">19</option>											<option value="20">20</option>											<option value="21">21</option>											<option value="22">22</option>											<option value="23">23</option>											<option value="24">24</option>											<option value="25">25</option>											<option value="26">26</option>											<option value="27">27</option>											<option value="28">28</option>											<option value="29">29</option>											<option value="30">30</option>											<option value="31">31</option>											</select>										</div>										</div>										<div id="provider_upload" class="form-group">											<label class="col-sm-2">Upload Logo: <sup class="alert">*</sup> </label>	                                        <div class="col-sm-8">	                                        	<div class="input-group image-preview">	                                            	<input type="text" class="form-control image-preview-filename" placeholder="Upload Profile Image" disabled="disabled">	                                            	<span class="input-group-btn">	                                   					<button type="button" class="btn btn-default image-preview-clear" style="display:none;">	                                        				<span class="glyphicon glyphicon-remove"></span> Clear	                                            		</button>		                                            	<div class="btn btn-default image-preview-input">		                                               	 	<span class="glyphicon glyphicon-folder-open"></span>		                                               		 <span class="image-preview-input-title">Browse</span>		                                                	<input type="file" accept="file_extension" name="input-file-preview" />		                                            	</div>		                                            </span>		                                         </div>		                                      </div> <br>		                                    <!-- <div class="imagepreview_act"> </div>	 -->	                                    </div>										<div class="form-group declaration">											<div class="col-sm-12">												<p>													<input id="declar_accept" class="ace" name="declar_accept" value="Y" type="checkbox">													<span class="lbl"></span>													I hereby declare that all the particulars furnished in this application are true, correct and complete to the best of my knowledge and belief.												</p>												<p>													<input id="optin_sms" class="ace" name="optin_sms" value="Y" type="checkbox">													<span class="lbl"></span>													I accept to receive sms notifications to the above specified mobile number.												</p>												<p>													<input id="optin_mail" class="ace" name="optin_mail" value="Y" type="checkbox">													<span class="lbl"></span>													I accept to receive E-mail notifications.												</p>											</div>										</div>										<div class="row">											<div class="loginbox-submit col-sm-12">												<a href="companydashboard/">												<input type="button" class="btn btn-default btn-medium pull-right" value="Submit & Next">												</a>											</div>										</div> 				                       	                            </form>                          </div> <!--.profile edit-->                    </div>                </div>            </div>        </section><?php include('include/footermenu.php'); ?><?php include ('include/footer.php'); ?>