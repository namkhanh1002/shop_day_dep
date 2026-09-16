BAN_GIAY_DEP_NU - WANG LUXURY
Website ban giay va dep nu viet bang PHP, MySQL/MariaDB, HTML, CSS va JavaScript.

1. Khoi dong du an
Yeu cau
XAMPP hoac moi truong PHP tuong duong.
PHP 8.x.
MySQL/MariaDB.
Extension mysqli va password_hash/password_verify cua PHP.
Cai dat
Dat thu muc du an tai:

C:\xampp\htdocs\BAN_GIAY_DEP_NU\BAN_GIAY_DEP_NU

Mo XAMPP va Start Apache, MySQL.

Tao database ten wang_luxury.

Import file wang_luxury.sql vao database.

Kiem tra thong tin ket noi trong:

model/ketnoi.php
admin/model_admin/ketnoi.php
Truy cap:

http://localhost/BAN_GIAY_DEP_NU/BAN_GIAY_DEP_NU/

Trang quan tri:

http://localhost/BAN_GIAY_DEP_NU/BAN_GIAY_DEP_NU/admin/

Neu gap loi HY000/2002 Connection refused, MySQL/MariaDB chua chay hoac dang dung cong khac. Du an hien mac dinh ket noi localhost, tai khoan root, mat khau rong, database wang_luxury.

2. Cau truc xu ly
index.php: entry point phia khach hang, khoi tao session va dieu phoi action.
controller/: tiep nhan request, kiem tra session, goi model va nap view.
model/: ket noi database va thao tac du lieu.
views/index.php: layout chung, gom header, noi dung theo route va footer.
views/dieuhuong.php: chon view noi dung theo action.
admin/index.php: entry point quan tri.
admin/controller_admin/: xu ly nghiep vu quan tri.
admin/model_admin/: truy van database phia quan tri.
admin/views_admin/: giao dien quan tri.
public/: CSS, JavaScript va tai nguyen giao dien.
wang_luxury.sql: cau truc va du lieu mau.
3. Luong trang khach hang
Trang chu
Request mac dinh hoac ?action=trangchu:

home_controller.php khoi tao model home.
Lay banner, loai san pham, san pham trang chu va thong tin layout.
Nap views/index.php.
Layout nap header, views/dieuhuong.php va footer.
Cua hang
?action=cuahang: xem san pham theo loai, mau, size, gia hoac khuyen mai.
?action=cuahang1: xem tat ca san pham hoac tim kiem theo ten.
?action=cuahang&id=...: loc theo loai san pham.
?action=cuahang&idmau=...: loc theo mau.
?action=cuahang&idsize=...: loc theo size.
POST a, b: loc theo khoang gia.
?action=cuahang&gtkm=...: loc theo gia tri khuyen mai.
Controller lay danh sach tu model, sau do truyen data_sanphamcuahang, color, size va data_loaisanpham cho view cua hang.

Chi tiet san pham
Route: ?action=chitietmathang&id=ID&idLoaiSP=ID

Lay san pham theo idSP.
Lay ten loai, mau, size va cac san pham lien quan.
Hien thi chi tiet, anh, mo ta, gia, ton kho.
Cho phep gui gopy va them san pham vao gio.
Dang ky
Route xu ly: ?action=dangky_xl

Form gui thong tin ca nhan, email, tai khoan va mat khau.
Model kiem tra trung tendangnhap hoac email bang prepared statement.
Mat khau moi duoc luu bang password_hash().
Tai khoan moi co quyen customer (idQuyen = 3).
Thanh cong thi quay ve trang dang nhap.
Dang nhap
Route xu ly: ?action=dangnhap_xl

Tim tai khoan theo ten dang nhap.
Xac minh mat khau bang password_verify().
Tao session idUser, tendangnhap, admin, banhang, thoigian_bd.
Dang nhap thanh cong quay ve trang chu.
Sai thong tin thi quay ve trang dang nhap.
Tai khoan cu trong file SQL co the dang luu MD5 cu. Cac tai khoan do can duoc cap nhat lai mat khau hash bang dang ky moi hoac chuc nang quen mat khau.

Dang xuat va het han session
?action=dangxuat: xoa thong tin tai khoan va quay ve trang chu.
Session dang nhap tu dong het han sau 3600 giay theo thoigian_bd.
Khi het han, session tai khoan va gio hang duoc xoa.
Quan ly tai khoan
Route xem tai khoan: ?action=taikhoan.

Hien thi thong tin nguoi dung.
Cap nhat ho, ten, email, dia chi, gioi tinh, so dien thoai va ten dang nhap.
Doi mat khau bang cach xac minh mat khau hien tai, sau do luu hash moi.
Trang tai khoan yeu cau dang nhap; mo trang GET khong lam doi mat khau.
Quen mat khau
?action=quenmatkhau: hien form nhap email.
?action=laymatkhau_submit: tim email va dat lai mat khau mac dinh 12345 duoi dang hash.
Sau khi dang nhap lai, nguoi dung nen doi mat khau ngay.
Gio hang
Route goc: ?action=giohang.

Session gio hang chinh: $_SESSION['sanpham'], luu theo idSP.

Moi dong san pham gom:

idSP
tenSP
Dongia
soluong
soluong_kho
thanhtien
anh1
Cac thao tac:

?action=giohang&act=add_giohang&id=ID: them 1 san pham, kiem tra san pham ton tai va ton kho.
?action=giohang&act=update_giohang&id=ID: tang so luong.
?action=giohang&act=update_giohang_tru&id=ID: giam so luong, xoa khi ve 0.
?action=giohang&act=xoagiohang&id=ID: giam/xoa mot san pham.
?action=giohang&act=xoagiohang_all: xoa toan bo gio hang.
Cac thao tac cap nhat va xoa deu kiem tra ID va phan tu session truoc khi truy cap.

Thanh toan
Route: ?action=thanhtoan.

Bat buoc dang nhap.
Bat buoc gio hang khong rong.
Lay thong tin nguoi dung tu database.
Lay gia tri khuyen mai cua san pham dau tien trong gio hang.
Luu gia tri khuyen mai vao $_SESSION['giatriKM'].
Hien thi thong tin nguoi nhan, san pham, tong tien va giam gia.
Form gui den ?action=hoanthanhdonhang.
Hoan tat don hang
Route: ?action=hoanthanhdonhang.

Kiem tra dang nhap va gio hang.
Lay idUser tu tai khoan dang nhap.
Tao mot ban ghi trong hoadon cho moi san pham.
Ap dung gia tri khuyen mai hien tai vao tongtien luu trong hoa don.
Tru so luong san pham trong sanpham.
Dat $_SESSION['donhang_da_tao'] de tranh tao hoa don trung khi refresh trang.
Hien thi trang hoan tat.
?action=huy_session xoa gio hang, tong tien, khuyen mai va trang thai don hang.
4. Luong quan tri
Truy cap bang /admin/. Cac nhom chuc nang hien co:

Dashboard va layout
trangchu: thong ke va hien thi dashboard.
sualayout: cap nhat thong tin header/footer.
xoalayout: xoa thong tin layout dang luu.
Tai khoan va phan quyen
taikhoan: danh sach nguoi dung.
xemnguoidung: xem chi tiet.
edit, sua_xl: sua tai khoan.
them_giaodien, them: them nguoi dung.
xoanguoidung: xoa nguoi dung.
phanquyen: thay doi quyen.
San pham
sanpham: danh sach san pham.
xemsanpham: xem chi tiet.
suasanpham, suasanpham_xl: sua san pham.
them_sanpham_giaodien, them_sanpham: them san pham.
them_soluong_giaodien, them_soluong: bo sung ton kho.
xoasanpham: xoa san pham.
Loai san pham
loaisanpham: danh sach loai.
xemloaisanpham: xem chi tiet.
sualoaisanpham, sualoaisanpham_xl: sua loai.
themloaisanpham_giaodien, themloaisanpham: them loai.
xoaloaisanpham: xoa loai.
Hoa don
hoadon: danh sach hoa don.
xemhoadon: xem chi tiet hoa don.
duyethoadon: duyet hoa don.
xoahoadon: xoa hoa don.
Banner va khuyen mai
Banner: xem, sua, them, xoa banner.
Khuyen mai: xem, sua, them, xoa khuyen mai.
5. Database chinh
Database: wang_luxury.

Bang quan trong:

user: thong tin tai khoan va quyen.
phanquyen: admin, banhang, customer.
sanpham: san pham, gia, anh, ton kho.
loaisanpham: nhom san pham.
color: mau sac.
size: kich co.
khuyenmai: chuong trinh va phan tram giam.
hoadon: cac dong san pham trong don hang.
gopy: gop y cua khach hang.
banner: anh banner.
layout: thong tin header/footer.
Quan he chinh:

sanpham.idLoaiSP -> loaisanpham.idLoaiSP.
sanpham.idcolor -> color.idcolor.
sanpham.idsize -> size.idsize.
sanpham.idKM -> khuyenmai.idKM.
hoadon.idUser -> user.idUser.
hoadon.idSP -> sanpham.idSP.
6. Bao mat va xu ly loi da co
Truy van co tham so nguoi dung trong cac model chinh dung prepared statement.
Mat khau moi dung password_hash() va dang nhap dung password_verify().
Redirect quan trong co exit de tranh chay tiep view sau khi chuyen trang.
Gio hang va thanh toan kiem tra session truoc khi truy cap.
Ket noi database kiem tra loi truoc khi goi set_charset().
Toan bo PHP hien da pass php -l.
7. Kiem tra nhanh
Tu thu muc du an chay:

Get-ChildItem -Recurse -File -Filter *.php | ForEach-Object { php -l $_.FullName }
Neu tat ca thanh cong, moi file se hien No syntax errors detected.

Kiem tra MySQL tren Windows:

Test-NetConnection 127.0.0.1 -Port 3306
Gia tri TcpTestSucceeded=True cho biet MySQL dang lang nghe.

8. Gioi han hien tai va de xuat tiep theo
Chuc nang quen mat khau dang dat lai mat khau mac dinh 12345; nen thay bang token reset gui qua email.
Gia tri khuyen mai trong gio hang hien lay theo san pham dau tien; neu mot gio hang co nhieu muc khuyen mai, nen luu khuyen mai theo tung dong gio hang.
Nen them middleware quyen admin/banhang truoc khi cho phep truy cap /admin/.
Nen them transaction cho tao hoa don va tru kho de tranh tru kho mot phan khi mot truy van that bai.
Nen them CSRF token cho cac form dang ky, cap nhat, thanh toan va thao tac quan tri.
Mot so model trong admin/model_admin/ van la code legacy voi truy van noi suy bien; nen chuyen tiep sang prepared statement truoc khi dua trang quan tri len moi truong that.
