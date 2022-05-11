create database qlthoitrang CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use qlthoitrang;
create table categories (
   category_id int(11) primary key auto_increment not null,
   category_name varchar(255),
   status tinyint(1) comment '0: Ẩn, 1: Hiện',
   category_type tinyint(1) comment '0: Nữ, 1: Nam'
);

create table types (
	type_id int(11) primary key auto_increment not null,
    type_name varchar(255),
    category_id int(11) not null default 0,
    constraint FK_category_type foreign key (category_id) references categories(category_id) on delete cascade on update cascade,
    status tinyint(1) comment '0: Ẩn, 1: Hiện'
);

create table products (
	product_id int(11) primary key auto_increment,
    product_name text,
    image text not null,
    sale float,
    price double not null,
    description text,
    quantity int(11) not null,
    size char(3),
    add_infor text,
    type_id int(11) not null default 0,
    constraint FK_product_type foreign key (type_id) references types(type_id) on delete cascade on update cascade,
    rate float,
    status tinyint(1) default 0 comment "0: Ẩn, 1: Hiện"
);

create table user_data (
	user_id int(11) primary key auto_increment not null,
    user_name varchar(255) not null,
    email char(255) not null,
    password char(255) not null,
    phone_number char(10) not null,
    gender tinyint(1),
    age int,
    address text,
    type tinyint(1) DEFAULT 0,
    avatar text,
    isActive tinyint(1) DEFAULT 1
);

create table reviews (
	review_id int(11) primary key auto_increment not null,
    rate float,
    review_content text not null,
    product_id int(11) not null DEFAULT 0,
    constraint FK_review_product foreign key (product_id) references products(product_id) on delete cascade on update cascade,
    user_id int(11) not null DEFAULT 0,
    constraint FK_review_user foreign key (user_id) references user_data(user_id) on delete cascade on update cascade,
    updated_date timestamp not null,
    created_date timestamp not null
);

create table blogs (
	blog_id int(11) primary key auto_increment not null,
    title text not null,
    content text not null,
    title_image text not null,
    author varchar(100) ,
    blog_date date not null
);

create table orders (
	order_id int(11) primary key auto_increment not null,
    user_id int(11) not null,
    constraint FK_order_user foreign key (user_id) references user_data(user_id) on delete cascade on update cascade,
    order_date date not null,
    required_date date,
    shipper_date date,
    comments text,
    result tinyint(1) default 0,
    address_ship text
);

create table order_details (
	id int(11) primary key auto_increment not null,
    order_id int(11) not null,
    constraint fk_order_details_order foreign key (order_id) references orders(order_id) on delete cascade on update cascade,
    product_id int(11) not null,
    constraint fk_order_details_product foreign key (product_id) references products(product_id) on delete cascade on update cascade,
    quantity int(11) not null
);
-- add user
insert into user_data values(1, 'Văn Tiến', 'vantienn740@gmail.com', '$2a$12$u3bTC.7kHSf14VNeyVrLfuibcTO8ooi7vlaNrgjmcajaExOq/6ZZu', '037758370', 1, 22, 'Thanh Hóa', 1, '1651669770_avatar.webp', 1);
insert into user_data values(2, 'Tiến Nguyễn', 'vantien2000@gmail.com', '$2a$12$u3bTC.7kHSf14VNeyVrLfuibcTO8ooi7vlaNrgjmcajaExOq/6ZZu', '0356789901', 1, 22, 'Thanh Hóa', 0, '1651669770_avatar.webp', 1);
-- add categories
insert into categories(category_name, status, category_type) values 
('Áo sơ mi nam', 1, 1),
('Áo nỉ nam', 1, 1),
('Áo phông nam', 1, 1),
('Áo polo nam', 1, 1),
('Áo khoác nam', 1, 1),
('Váy đầm', 1, 0),
('Chân váy', 1, 0),
('Sơ mi nữ', 1, 0),
('Quần âu nữ', 1, 0),
('Len nữ', 1, 0);

insert into types(type_name, status, category_id) values 
('Áo sơ mi dài tay', 1, 1),
('Áo sơ mi trắng', 1, 1),
('Áo sơ mi caro', 1, 1),
('Áo sơ mi họa tiết', 1, 1),
('Đầm xòe', 1, 6),
('Đầm xuông', 1, 6),
('Đầm ôm', 1, 6),
('Chân váy bút chì', 1, 7),
('Chân váy ôm', 1, 7),
('Chân váy xòe', 1, 7),
('Chân váy đẹp', 1, 7);

insert into types(type_name, status, category_id) values ('Áo sơ mi nữ', 1, 8);

insert into products(product_name, image, sale, price, description, quantity, size, add_infor, type_id, rate, status)
values ('Áo sơ mi caro xám (M001)', 'ao_so_mi_caro_xam.webp', '15', 500000, '', 150, 'L', '', 3, 5, 1),
('Áo sơ mi caro xanh duong', 'ao_so_mi_caro_xanh_duong.webp', '20', 600000, '', 100, 'L', '', 3, 4.5, 1),
('Áo sơ mi dài tay nam basic (4SMDB002TRK)', 'ao_so_mi_dai_tay_nam_basis_4SMDB002TRK.webp', '50', 400000, '', 200, 'S', '', 1, 4, 1),
('Áo sơ mi dài tay nam basic (4SMDB003TRK)', 'ao_so_mi_dai_tay_nam_basis_4SMDB003TRK.webp', '50', 600000, '', 250, 'L', '', 1, 4, 1),
('Áo sơ mi dài tay trắng caro (4SMDB003TRK)', 'ao_so_mi_dai_tay_trang_caro_4SMDC002TRK.webp', '30', 800000, '', 10, 'M', '', 1, 4, 1),
('Áo sơ mi nam (SMM-N688)', 'ao_so_mi_nam_(SMM-N688).webp', '50', 600000, '', 50, 'L', '', 2, 4, 1),
('Áo sơ mi nam dài tay basic (4SMDB003DEN)', 'ao_so_mi_nam_dai_tay_basis_4SMDB003DEN.webp', '30', 800000, '', 60, 'L', '', 1, 4, 1),
('Áo sơ mi nam REGULAR FIT AVAFashion NBCSE', 'ao_so_mi_nam_REGULAR_FIT_AVAFashion_NBCSE.webp', '40', 800000, '', 80, 'XL', '', 1, 4, 1),
('Áo sơ mi nữ thanh mảnh', 'ao_so_mi_nu_thanh_manh.webp', '15', 600000, '', 100, 'M', '', 12, 5, 1),
('Áo sơ mi trắng họa tiết nam (4SMCH011TRT)', 'ao_so_mi_trang_hoa_tiet_nam_4SMCH011TRT.webp', '20', 500000, '', 100, 'L', '', 2, 5, 1),
('Chân váy bút chì bộ cổ điển', 'chan_vay_but_chi_bo_coi_dich.webp', '30', 800000, '', 120, 'M', '', 8, 5, 1),
('Chân váy bút chì cúc kim loại', 'chan_vay_but_chi_cuc_kim_loai_Size_L.webp', '30', 800000, '', 20, 'L', '', 8, 5, 1),
('Chân váy bút chì (F551302)', 'chan_vay_but_chi_F551302.webp', '20', 800000, '', 60, 'M', '', 8, 5, 1),
('Đầm dáng suông cổ tròn', 'dam_dang_suong_co_tron.webp', '20', 800000, '', 80, 'M', '', 6, 5, 1),
('Đầm dáng suông cổ V buộc dây nơ gấu xếp ly', 'dam_dang_suong_co_V_buoc_day_no_gau_xep_ly.webp', '20', 800000, '', 70, 'M', '', 6, 4, 1),
('Đầm dáng xòe đuôi có thắt đai eo', 'dam_dang_xoe_duoi_ca_that_dai_eo.webp', '20', 800000, '', 100, 'M', '', 10, 5, 1),
('Đầm họa tiết hoa xanh xòe', 'dam_hoa_tiet_hoa_xanh_xoe.webp', '50', 900000, '', 10, 'M', '', 10, 5, 1),
('Đầm suông tay lỡ', 'dam_suong_tay_lo.webp', '50', 500000, '', 10, 'M', '', 5, 5, 1);

insert into products(product_name, image, sale, price, description, quantity, size, add_infor, type_id, rate, status)
values ('Đầm xòe cổ đức đính cúc', 'dam_xoe_co_duc_dinh_cuc.webp', '40', 800000, '', 30, 'M', '', 10, 5, 1);

insert into products(product_name, image, sale, price, description, quantity, size, add_infor, type_id, rate, status)
values ('Đầm xòe họa tiết hoa hồng', 'dam_xoe_hoa_tiet_hoe_hong.webp', 20, 400000 , '', 20 ,'M', '', 10, 5, 1);