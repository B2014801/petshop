function ShowPassword(input){
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
function ValidateFormDanhMuc(){
    if(document.querySelector('#tendanhmuc').value==''){
        alert('vui lòng nhập tên danh mục');
        return false;
    }
}
function ValidateFormHieu(){
    let tenhieu=document.querySelector('#tenhieusanpham');
    let anh=document.querySelector('#anhhieusanpham');
    if(tenhieu.value==''){
        alert('vui lòng nhập tên hiệu sản phẩm');
        return false;
    }
    if(anh.value==''){
        alert('vui lòng chọn hình ảnh');
        return false;
    }
}
function ValidateFormSanPham(){
    let tensp=document.querySelector('#tensp');
    let giasp=document.querySelector('#giasp');
    let soluongsp=document.querySelector('#soluongsp');
    let hinhanhsp=document.querySelector('#hinhanhsp');

    if(tensp.value==''){
        alert('vui lòng nhập tên sản phẩm');
        return false;
    }
    if(giasp.value==''){
        alert('vui lòng nhập giá sản phẩm');
        return false;
    }
    if(soluongsp.value==''){
        alert('vui lòng nhập số lượng sản phẩm');
        return false;
    }
    if(hinhanhsp.value==''){
        alert('vui lòng chọn hình ảnh sản phẩm');
        return false;
    }
}

  const selectElement = document.getElementById('sapxepspkho');
  selectElement.addEventListener('change', (event) => {
    document.getElementById('formsapxepspkho').submit();
  });
function checkCongThemSp(){
    sl=document.querySelector('#sl-sp-cong-them');
    if (sl.value=='') {
        alert('vui lòng nhập số lượng');
        return false;
    }
}
