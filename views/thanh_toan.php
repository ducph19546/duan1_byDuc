    <!-- thanhtoan -->
    <div class="md:flex md:flex-row flex-col-reverse mx-auto container">
        <div class="md:text-left text-center box_1">
            <h1 class="text-3xl mt-5">Sport Bicycle</h1>
            <p class="text-xl py-5">Thông tin giao hàng</p>
            <form action="">
                    <div>
                        <input type="text" name="userName" value="<?php echo isset($_SESSION['user'])? $userName:"";?>" placeholder="Họ và tên" class="py-3 border md:w-[500px] w-full my-5 pl-1 rounded outline-none shadow-sm">
                    </div>
                    <div>
                        <input type="email" name="userEmail" value="<?php echo isset($_SESSION['user'])?$emailUser:"";?>" placeholder="Email" class="py-3 border md:w-[300px] w-full my-5 pl-1 rounded outline-none shadow-sm">
                        <input type="text" name="orderSdt" placeholder="SDT" class="py-3 border md:w-[196px] w-full my-5 pl-1 rounded outline-none shadow-sm">
                    </div>
                    <div>
                        <input type="text" name="orderLocation" placeholder="Địa Chỉ" class="py-3 border md:w-[500px] w-full my-5 pl-1 rounded outline-none shadow-sm">
                    </div>
                    <div>
                    <textarea class="w-[500px] bg-[#ededed] h-[130px] p-2 outline-none" cols="30" rows="10" placeholder="Ghi Chú" name="orderDetailNote"></textarea>
                    </div>
                    <button class="bg-blue-500 text-white hover:bg-blue-300 py-5 px-3 rounded" type="submit">Tiếp Tục Thanh Toán</button>
                </form>
            <div class="text-center mt-[250px]">
                <hr>
                <span class="pt-5">Code by nhóm 8</span>

            </div>

        </div>
        <div class="box_2 ">
            <?php
            $tongtien = 0;
            $so_luong = 0;
            foreach ($productOder as $row) {
                $thanh_tien = $row['productPrice'] * $row['so_luong'];
                $tongtien += $thanh_tien;
                $so_luong += $row['so_luong'];
            ?>
                <div class="flex mt-7 border p-2">
                    <img class="w-[100px] h-[100px] border rounded" src="../img/<?php echo $row['productImage'] ?>" alt="">
                    <div class="pl-5 py-5">
                        <strong><?php echo $row['productName'] ?></strong>
                        <span class="block"><?php echo $row['productColor'] ?></span>
                        <span class="block">Sl:<?php echo $row['so_luong'] ?></span>
                    </div>
                    <p class="py-5 pl-[100px]"><?php echo number_format($thanh_tien) ?>₫</p>
                </div>
            <?php
            }
            ?>
            <div class="pt-5 flex">
                <hr>
                <h3 class="text-lg">Tạm phí</h3>
                <p class=" pl-[100px]"><?php echo number_format($tongtien) ?>₫</p>
                
            </div>
        </div>
    </div>
    <style>
        .box_1 {
            border: 1px solid;
            border-bottom: transparent;
            border-top: transparent;
            border-left: transparent;
            padding-right: 150px;
        }

        .box_2 {
            padding-left: 100px;

        }
    </style>