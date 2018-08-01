function loginForm()
{
	var username=document.forms["formlogin"]["username"].value;
	var password=document.forms["formlogin"]["password"].value;
	var error="";
		if (username==null || username=="")
		  {
			error+="Bạn chưa nhập tên đăng nhập\n";
		  }
		if (password==null || password=="")
		  {
			error+="Bạn chưa nhập mật khẩu\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
}


function phuhuynh()
{
	var username=document.forms["phuhuynh1"]["username"].value;
	var ngay=document.forms["phuhuynh1"]["ngay"].value;
	var thang=document.forms["phuhuynh1"]["thang"].value;
	var nam=document.forms["phuhuynh1"]["nam"].value;
	var gioitinh=document.forms["phuhuynh1"]["sex"].value;
	var vaitro=document.forms["phuhuynh1"]["vaitro"].value;
	var diachi=document.forms["phuhuynh1"]["diachi"].value;
	var sdt=document.forms["phuhuynh1"]["sdt"].value;
	var error="";
	if (username==null || username=="")
		  {
			error+="Bạn chưa nhập tên phụ huynh\n";
		  }
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		   var havecheck="Bạn chưa chọn giới tính\n";
				
					if (document.phuhuynh1.sex[0].checked){
						havecheck="";
					}
					if (document.phuhuynh1.sex[1].checked){
						havecheck="";
					}
					if (document.phuhuynh1.sex[2].checked){
						havecheck="";
					}
						error+=havecheck;
		 if (vaitro==null || vaitro==""|| vaitro=="Vaitro")
		  {
			error+="Bạn chưa chọn vai trò\n";
		  }
		 if (diachi==null || diachi=="")
		  {
			error+="Bạn chưa nhập địa chỉ\n";
		  }
		  if (sdt==null || sdt=="")
		  {
			error+="Bạn chưa nhập số điện thoại\n";
		  }
		 
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}

function hocsinh()
{
	var hoten=document.forms["hocsinh1"]["hoten"].value;
	var ngay=document.forms["hocsinh1"]["ngay"].value;
	var thang=document.forms["hocsinh1"]["thang"].value;
	var nam=document.forms["hocsinh1"]["nam"].value;
	var gioitinh=document.forms["hocsinh1"]["sex"].value;
	var lop=document.forms["hocsinh1"]["lop"].value;
	var phuhuynh=document.forms["hocsinh1"]["phuhuynh"].value;
	var error="";
	if (hoten==null || hoten=="")
		  {
			error+="Bạn chưa nhập tên học sinh\n";
		  }
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		   var havecheck="Bạn chưa chọn giới tính\n";
				
					if (document.hocsinh1.sex[0].checked){
						havecheck="";
					}
					if (document.hocsinh1.sex[1].checked){
						havecheck="";
					}
					if (document.hocsinh1.sex[2].checked){
						havecheck="";
					}
						error+=havecheck;
		 if (lop==null || lop==""|| lop=="Chọn lớp")
		  {
			error+="Bạn chưa chọn lớp\n";
		  }
		 if (phuhuynh==null || phuhuynh==""|| phuhuynh=="Chọn PH")
		  {
			error+="Bạn chưa chọn tên phụ huynh\n";
		  }
		 
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}

function canbo()
{
	var username=document.forms["canbo1"]["username"].value;
	var ngay=document.forms["canbo1"]["ngay"].value;
	var thang=document.forms["canbo1"]["thang"].value;
	var nam=document.forms["canbo1"]["nam"].value;
	var gioitinh=document.forms["canbo1"]["sex"].value;
	var chucvu=document.forms["canbo1"]["chucvu"].value;
	var diachi=document.forms["canbo1"]["diachi"].value;
	var sdt=document.forms["canbo1"]["sdt"].value;
	var error="";
	if (username==null || username=="")
		  {
			error+="Bạn chưa nhập tên cán bộ\n";
		  }
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		   var havecheck="Bạn chưa chọn giới tính\n";
				
					if (document.canbo1.sex[0].checked){
						havecheck="";
					}
					if (document.canbo1.sex[1].checked){
						havecheck="";
					}
					if (document.canbo1.sex[2].checked){
						havecheck="";
					}
						error+=havecheck;
		 if (chucvu==null || chucvu==""|| chucvu=="Chức vụ")
		  {
			error+="Bạn chưa chọn chức vụ\n";
		  }
		 if (diachi==null || diachi=="")
		  {
			error+="Bạn chưa nhập địa chỉ\n";
		  }
		  if (sdt==null || sdt=="")
		  {
			error+="Bạn chưa nhập số điện thoại\n";
		  }
		 
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}

function lop()
{
	var malop=document.forms["lop1"]["malop"].value;
	var error="";
	if (malop==null || malop=="")
		  {
			error+="Bạn chưa nhập lớp\n";
		  }
		 
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}

function qlcanbo()
{
	var canbo=document.forms["qlcanbo1"]["canbo"].value;
	var nam=document.forms["qlcanbo1"]["nam"].value;
	var hocky=document.forms["qlcanbo1"]["hocky"].value;
	var lop=document.forms["qlcanbo1"]["lop"].value;
	var error="";
	if (canbo==null || canbo=="" || canbo=="Chọn CB")
		  {
			error+="Bạn chưa chọn cán bộ\n";
		  }
		  if (nam==null || nam=="" || nam=="Chọn NH")
		  {
			error+="Bạn chưa chọn năm học\n";
		  }
		 if (hocky==null || hocky==""|| hocky=="Chọn HK")
		  {
			error+="Bạn chưa chọn học kỳ\n";
		  }
		 if (lop==null || lop==""|| lop=="Chọn lớp")
		  {
			error+="Bạn chưa chọn lớp\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}
function thucpham()
{
	var mamon=document.forms["thucpham1"]["mamon"].value;
	var tentp=document.forms["thucpham1"]["tentp"].value;
	var error="";
	if (mamon==null || mamon=="" || mamon=="Chọn món")
		  {
			error+="Bạn chưa chọn món ăn\n";
		  }
		  if (tentp==null || tentp=="")
		  {
			error+="Bạn chưa nhập tên thực phẩm\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
}
function monan()
{
	var tenmon=document.forms["monan1"]["tenmon"].value;
	var error="";
	if (tenmon==null || tenmon=="")
		  {
			error+="Bạn chưa nhập tên món ăn\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
}
function dk()
{
	var mahs=document.forms["dk1"]["mahs"].value;
	var ngay=document.forms["dk1"]["ngay"].value;
	var error="";
	if (mahs==null || mahs=="" || mahs=="Chọn HS")
		  {
			error+="Bạn chưa chọn học sinh\n";
		  }
	if (ngay==null || ngay=="" || ngay=="Chọn ngày")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
}
function mangay()
{
	var ngay=document.forms["mangay1"]["ngay"].value;
	var thang=document.forms["mangay1"]["thang"].value;
	var nam=document.forms["mangay1"]["nam"].value;
	var mamon=document.forms["mangay1"]["mamon"].value;
	var error="";
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		 if (mamon==null || mamon==""|| mamon=="Chọn món")
		  {
			error+="Bạn chưa chọn món ăn\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}
function loaiphi()
{
	var tenphi=document.forms["loaiphi1"]["tenphi"].value;
	var error="";
	if (tenphi==null || tenphi=="")
		  {
			error+="Bạn chưa nhập tên phí\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
}
function phieuthu()
{
	var tenpt=document.forms["phieuthu1"]["tenpt"].value;
	var ngay=document.forms["phieuthu1"]["ngay"].value;
	var thang=document.forms["phieuthu1"]["thang"].value;
	var nam=document.forms["phieuthu1"]["nam"].value;
	var mahs=document.forms["phieuthu1"]["hocsinh"].value;
	var maphi=document.forms["phieuthu1"]["maphi"].value;
	var sotien=document.forms["phieuthu1"]["sotien"].value;
	var error="";
	if (tenpt==null || tenpt=="")
		  {
			error+="Bạn chưa nhập tên phiếu thu\n";
		  }
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		 if (mahs==null || mahs==""|| mahs=="Chọn HS")
		  {
			error+="Bạn chưa chọn học sinh\n";
		  }
		 if (maphi==null || maphi==""|| maphi=="Chọn Phí")
		  {
			error+="Bạn chưa chọn loại phí\n";
		  }
		 if (sotien==null || sotien=="")
		  {
			error+="Bạn chưa nhập số tiền\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}
function phieuchi()
{
	var tenpc=document.forms["phieuchi1"]["tenpc"].value;
	var ngay=document.forms["phieuchi1"]["ngay"].value;
	var thang=document.forms["phieuchi1"]["thang"].value;
	var nam=document.forms["phieuchi1"]["nam"].value;
	var thucpham=document.forms["phieuchi1"]["thucpham"].value;
	var sotien=document.forms["phieuchi1"]["sotien"].value;
	var error="";
	if (tenpc==null || tenpc=="")
		  {
			error+="Bạn chưa nhập tên phiếu chi\n";
		  }
		if (ngay==null || ngay=="" || ngay=="Ngay")
		  {
			error+="Bạn chưa chọn ngày\n";
		  }
		 if (thang==null || thang=="" || thang=="Thang")
		  {
			error+="Bạn chưa chọn tháng\n";
		  }
		  if (nam==null || nam=="" || nam=="Nam")
		  {
			error+="Bạn chưa chọn năm\n";
		  }
		 if (thucpham==null || thucpham==""|| thucpham=="Chọn TP")
		  {
			error+="Bạn chưa chọn thực phẩm\n";
		  }
		 if (sotien==null || sotien=="")
		  {
			error+="Bạn chưa nhập số tiền\n";
		  }
		 if (error!="")
		 {
			alert(error);
			return false;
		 }
	
}