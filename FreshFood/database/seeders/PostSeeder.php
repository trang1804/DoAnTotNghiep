<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Điều gì xảy ra khi bạn ăn quá nhiều thịt?',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/28/11/dieu-gi-xay-ra-khi-ban-an-qua-nhieu-thit.jpg',
                'date_update' => '2022-01-29',
                'description' => 'Một bữa ăn đầy ắp thịt có thể khiến bạn mệt mỏi, tiêu hóa khó ngay sau đó và để lại hậu quả lâu dài.',
                'content' => '
                Đổ “mồ hôi thịt"
                Nếu từng ăn rất nhiều thịt cùng lúc, bạn có thể gặp phải hiện tượng "mồ hôi thịt" - giữa chừng hoặc sau bữa, bạn bắt đầu đổ nhiều mồ hôi.
                Khi bạn ăn, cơ thể phải tạo ra một số năng lượng để tiêu hóa lượng thực phẩm đó. Đây là quá trình sinh nhiệt do ăn uống và có khả năng làm tăng thân nhiệt. 
                Tiêu hóa protein sẽ tốn nhiều năng lượng nhất, tác động lớn hơn đến quá trình sinh nhiệt so với một đĩa mỳ hoặc salad. 
                Mệt mỏi, đặc biệt sau bữa ăn hoành tráng
                Bạn sẽ mất một lượng năng lượng lớn để tiêu hóa nhiều thịt. Khi đó, cơ thể sẽ di chuyển lưu lượng máu đến ruột để ưu tiên quá trình này, giảm tới các cơ quan khác, gồm cả não. Bởi vậy, bạn sẽ cảm thấy uể oải, mất tập trung, buồn ngủ sau khi ăn.
                Điều này cũng có thể đúng với chế độ ăn không lành mạnh, chứa quá nhiều tinh bột hoặc chất béo, khiến lượng insulin và lượng đường trong máu tăng đột biến.
                Ngoài ra, một số loại thịt như thịt bò và gà tây chứa nhiều tryptophan, loại axit amin liên quan đến việc sản xuất melatonin điều hòa giấc ngủ của con người.
                Quá trình tiêu hóa thiếu chất xơ
                Một hậu quả của việc tiêu thụ quá nhiều thịt là bạn có thể ăn ít các loại thực phẩm khác, bao gồm ngũ cốc nguyên hạt, rau củ quả. Hậu quả, bạn dễ bị đầy hơi, táo bón, tiêu chảy do tiêu hóa kém.
                Thịt chứa nhiều chất dinh dưỡng nhưng thiếu chất xơ, rất quan trọng cho quá trình tiêu hóa và điều chỉnh lượng đường trong máu. Nếu không có chất xơ, bạn có nguy cơ bị đau dạ dày nghiêm trọng.
                Chế độ ăn giàu chất xơ giúp tiêu hóa tốt hơn và có lợi cho sức khỏe tổng thể. Các nhà nghiên cứu tin rằng điều này do chất xơ cung cấp nguồn thức ăn tốt cho vi khuẩn có lợi trong đường ruột.
                Mất nước
                Một tác dụng phụ khác của tất cả protein trong chế độ ăn nhiều thịt là lấy rất nhiều nước trong cơ thể để xử lý, khiến bạn bị mất nước.
                Mặc dù protein rất quan trọng đối với sức khỏe, bao gồm cả việc tạo cơ bắp, nhưng mọi người có xu hướng nghĩ rằng họ cần nhiều hơn thực tế.
                Khuyến nghị về protein chỉ khoảng 0,8g cho mỗi kg trọng lượng cơ thể đối với người ít hoạt động. Các vận động viên chỉ cần 2g cho mỗi kg trọng lượng.
                Nếu ăn nhiều hơn, cơ thể sẽ sử dụng nhiều chất lỏng hơn để đào thải nitơ dư thừa. Nếu không uống đủ nước để bù đắp, bạn sẽ cảm thấy choáng váng hoặc khó chịu.
                Ảnh hưởng nỗ lực giảm cân
                Chế độ ăn giàu protein có thể giúp đạt được mục tiêu giảm cân khi bạn no lâu hơn và mang lại một chút lợi thế nhờ việc đốt cháy calo do sinh nhiệt.
                Nhưng nếu bữa ăn bao gồm protein động vật, cần lưu ý một số loại thịt có thể rất giàu calo so với protein từ thực vật.
                Những loại có nhiều calo nhất bao gồm phần thịt béo và các sản phẩm chế biến sẵn như bánh mì kẹp thịt, thịt xông khói, xúc xích...
                Vì vậy, nếu bạn đang cố gắng giảm cân, hãy chọn phần nạc của thịt bò, gia cầm hoặc cá. Tất cả đều có ít calo hơn.
                Nguy cơ mắc ung thư và bệnh tim mạch
                Các nghiên cứu đã liên kết việc tiêu thụ nhiều thịt đỏ và thịt chế biến sẵn với nguy cơ mắc một số loại ung thư, bệnh tim mạch.
                Các loại thịt đã qua chế biến như thịt xông khói, xúc xích đều được xử lý bằng chất bảo quản. Những hóa chất này được phát hiện có liên quan đến nguy cơ ung thư ruột kết, thận và dạ dày cao hơn.
                ',
                'source' => 'An Yên (Theo Insider)'
           
            ],
            [
                'title' => 'Thức ăn thừa nên để trong tủ lạnh bao lâu?',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/25/16/nen-de-thuc-an-thua-trong-tu-lanh-bao-lau-1.jpg',
                'date_update' => '2022-02-05',
                'description' => 'Đa số các món ăn đã chế biến có thể để 3-4 ngày trong tủ lạnh dưới 4 độ C.',
                'content' => 'Vào mùa nghỉ lễ, các gia đình thường chuẩn bị quá nhiều thức ăn ngon dẫn đến dư thừa cần tích trữ.
                Tốt nhất, bạn nên đông lạnh đồ thừa để giữ được hương vị tươi ngon trong thời gian dài.
                Nhưng không phải ai cũng biết bảo quản đúng cách khiến bạn dễ ăn phải đồ không còn chất lượng. Dưới đây là thời gian thực phẩm để trong tủ lạnh còn ăn được, 
                những điều cần lưu ý trước khi dùng, đặc biệt nếu bạn không nhớ đã để bao lâu.
                Thức ăn thừa thường lưu trữ được từ 3 đến 4 ngày trong tủ lạnh trước khi xuất hiện nguy cơ ngộ độc.
                Rau quả
                Loại thực phẩm này phải được làm sạch dưới vòi nước chảy, để ráo và bảo quản trong tủ lạnh dưới 4 độ C, theo hướng dẫn của Cục Quản lý Thực phẩm và Dược phẩm Mỹ (FDA).
                Khoai tây nấu chín có thể cất trong tủ lạnh từ 3 đến 4 ngày.
                Theo Hiệp hội Tim mạch Mỹ, một số loại trái cây thải ra khí ethylene có thể khiến các sản phẩm xếp bên cạnh hư hỏng nhanh hơn. Bạn nên để táo cách xa các loại rau củ quả khác.
                Trái cây trong tủ lạnh cần ăn hết trong vòng 1 đến 3 ngày để có hương vị và độ tươi tối đa.
                Trứng và sản phẩm liên quan tới sữa
                Trứng sống có thể giữ trong tủ lạnh từ 3 đến 5 tuần. Trứng luộc chín còn ăn được trong 1 tuần. Trứng và các sản phẩm từ sữa thích hợp trong không gian dưới 4 độ C.
                Các sản phẩm từ sữa để trong tủ lạnh giữ được chất lượng trong các khoảng thời gian khác nhau: Sữa (1 tuần), sữa chua (1-2 tuần), phô mai mềm (1 tuần), phô mai cứng (3-4 tuần sau khi mở).
                Các món ăn khác
                Món nướng có chứa trứng để trong tủ lạnh từ 3 đến 5 ngày. Thịt đã chế biến để được 3-5 ngày.
                Thời gian để trong tủ lạnh của cá nấu chín là 3-4 ngày, cá hun khói là 14 ngày. Các loại hải sản có vỏ cứng đã chế biến để 2 ngày.
                Bánh mì nướng cất tủ lạnh vẫn ăn được trong vòng 1-2 tuần. Cơm để trong 3-5 ngày; súp, canh, các món hầm (3-4 ngày).
                Tuổi thọ của các món tráng miệng trong tủ lạnh khác nhau. Bánh quy để được đến 2 tháng trong tủ lạnh còn các món tráng miệng có độ ẩm như bánh phô mai dùng trong một tuần.
                Rủi ro tiềm ẩn khi ăn đồ thừa bị hỏng
                Theo Bộ Y tế và Dịch vụ Nhân sinh Mỹ, từ 3 đến 4 ngày là quy tắc chung về thời gian đồ thừa vẫn ăn được. Đồ thừa quá thời hạn hoặc chưa được đun nóng kỹ khiến bạn có nguy cơ ngộ độc thực phẩm với các triệu chứng như buồn nôn, nôn, bụng đau quặn, tiêu chảy, sốt.
                Tất nhiên, bạn không nên ăn đồ có các biểu hiện hư hỏng. Nhưng nếu đồ để quá lâu nhưng trông vẫn ổn và có mùi thơm, điều đó không đồng nghĩa chúng an toàn. Nhiều loại vi khuẩn gây bệnh không ảnh hưởng đến mùi vị, bề ngoài của thực phẩm.
                Không phải tất cả mọi người ăn đồ hết hạn đều bị ngộ độc. Các nhóm đối tượng có nguy cơ cao là người trên 65 tuổi, trẻ dưới 5 tuổi, phụ nữ mang thai, người có bệnh nền hoặc đang dùng thuốc suy giảm miễn dịch…
                Tuổi thọ của đồ ăn thừa trong tủ đông sẽ cao hơn. Ví dụ, thịt hầm (2-3 tháng), lòng trắng trứng (12 tháng), nước thịt, thịt (2-3 tháng), súp, đồ hầm (2-3 tháng), pizza (1-2 tháng), cá nạc (6-8 tháng), cá béo như cá hồi, cá ngừ (2-3 tháng), thịt xông khói và xúc xích (1-2 tháng), thịt nấu chín (2-3 tháng).',
                'source' => 'An Yên (Theo Livestrong)'
            ],
            [
                'title' => 'Lý do không nên để hành tây, tỏi trong tủ lạnh',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/24/17/q1.jpg',
                'date_update' => '2022-01-30',
                'description' => 'Nhiều thực phẩm sẽ tươi, ăn được lâu hơn khi cất trong tủ lạnh nhưng điều đó không đúng với hành tây và tỏi.',
                'content' => 'Trái cây và rau có thể để được hàng tuần khi bảo quản đúng cách trong tủ lạnh. Nhưng hành tây và tỏi không thích hợp với môi trường lạnh giá.
                Bếp trưởng người Mỹ, Kristen Farmer Hall, giải thích: “Hành tây hấp thụ nhiều độ ẩm trong tủ lạnh sẽ sớm hư hỏng. Các loại tinh bột cũng chuyển thành đường nhanh hơn trong môi trường ẩm, lạnh”.
                Theo thông tin từ Đại học California, cất tỏi trong tủ lạnh sẽ kích thích mọc mầm. Mặc dù tỏi mọc mầm không có hại nhưng đó là dấu hiệu cho thấy tỏi đã qua giai đoạn có chất lượng cao nhất.
                Cách bảo quản hành tây, tỏi
                Theo Hiệp hội Hành Quốc gia Mỹ, thay vì cất vào tủ lạnh, hãy bảo quản hành ở nơi khô ráo, thoáng mát.
                Khu vực có độ ẩm cao hoặc thiếu không khí lưu thông sẽ đẩy nhanh quá trình hư hỏng của hành và ánh sáng mặt trời chiếu vào sẽ khiến hành nảy mầm. Khi được bảo quản đúng cách, hành tây có thời hạn sử dụng lên tới 30 ngày.
                Với hành tây đã sơ chế cần có cách bảo quản khác. Hành đã bóc lớp vỏ ngoài cùng nên được bảo quản trong tủ lạnh và có thời hạn sử dụng khoảng 10 đến 14 ngày.
                Hành tây đã cắt lát hoặc hạt lựu cũng cần để trong tủ lạnh. Thời hạn sử dụng của chúng ngắn hơn một chút: khoảng 7 đến 10 ngày.
                Tỏi cũng cần bảo quản theo cách tương tự, ở nơi khô ráo, thoáng mát. Tuy nhiên, tỏi sẽ để được lâu hơn hành tây - khoảng 3 đến 5 tháng trong điều kiện lý tưởng.
                Với tỏi đã bóc vỏ, băm nhỏ, hãy bảo quản trong ngăn đá. Bạn chỉ cần bọc trong túi thật chặt để càng kín gió càng tốt.
                Tỏi cũng có thể bóc vỏ và xay nhuyễn với một ít dầu cho đến khi tạo thành một hỗn hợp đặc. Sau đó, hỗn hợp dầu tỏi cần được đông lạnh trong hộp kín.
                Điều rất quan trọng là không được giữ tỏi xay nhuyễn ở nhiệt độ phòng. Điều đó dễ dàng dẫn đến sự phát triển của vi khuẩn độc hại có thể gây chết người.
                Cách chọn hành tây và tỏi
                Tại chợ, siêu thị, hãy tìm những củ hành tây có vỏ ngoài khô ráo, không có tì vết hoặc đốm, không có mùi lạ.
                Với tỏi, chọn các tép có trọng lượng phù hợp với kích thước, tránh mua nhầm tỏi thối rữa, teo tóp. Chọn tỏi sạch sẽ, còn nguyên vỏ, không mọc mầm, không có nấm mốc.',
                'source' => 'An Yên (Theo Livestrong)'
            ],
            [
                'title' => 'Ăn măng ngày Tết thế nào để không có hại cho sức khoẻ?',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/21/15/an-mang-co-loi-hay-co-hai-1.jpg',
                'date_update' => '2022-01-24',
                'description' => 'Măng có nhiều chất dinh dưỡng tăng sức khỏe đường ruột nhưng cần luộc chín để loại bỏ chất gây hại.',
                'content' => '
                Măng là nguyên liệu phổ biến trong ẩm thực ở các nước châu Á, trong đó có Việt Nam. Có tới 1.500 loại tre khác nhau trên thế giới, có một số loại phổ biến được khai thác măng để nấu ăn.
                Dinh dưỡng
                Măng là loại thực phẩm có giá trị dinh dưỡng cao, chứa nhiều chất xơ, đồng, vitamin B6 và E. Trong một khẩu phần măng 155g có 64 calo, 2,5g chất đạm, 4,5g chất béo, 5g carb, 2g chất xơ và nhiều loại vitamin…
                Măng đặc biệt chứa nhiều đồng, khoáng chất quan trọng đối với làn da, chức năng não của bạn… Vitamin B6 có trong măng hỗ trợ hơn 100 phản ứng sinh hóa trong tế bào của cơ thể.
                Ngoài ra, ăn măng làm tăng lượng vitamin E, hoạt động như chất chống oxy hóa mạnh chống lại chứng viêm và bệnh mạn tính.
                Lợi ích
                - Giảm mức cholesterol
                Một số nghiên cứu ghi nhận măng giúp giảm mức cholesterol, cải thiện sức khỏe tim mạch. Phân tích quy mô nhỏ với 8 phụ nữ khỏe mạnh ăn 360g măng giảm đáng kể mức cholesterol toàn phần và có hại sau 6 ngày.
                Điều này có thể do chất xơ hòa tan có trong măng. Chất xơ hấp thụ nước trong ruột và có liên quan đến việc giảm mức cholesterol.
                - Tăng cường sức khỏe đường ruột
                Chất xơ trong măng có khả năng chống lại các vấn đề như bệnh trĩ, ung thư đại trực tràng. Măng cũng cung cấp nhiên liệu cho vi khuẩn có lợi trong đường ruột.
                Nghiên cứu cho thấy hệ vi sinh vật đường ruột đóng vai trò quan trọng đối với sức khỏe, ngăn ngừa bệnh tim, ung thư, tiểu đường loại 2, trầm cảm và béo phì.
                - Hỗ trợ giảm cân
                Măng có hàm lượng calo thấp nhưng lại giàu chất xơ, giúp bạn cảm thấy no lâu hơn giữa các bữa ăn. Do đó, đây là một thực phẩm bổ sung tuyệt vời cho chế độ ăn kiêng giảm cân lành mạnh.
                Việc tăng lượng chất xơ giúp giảm cân và giảm mỡ bụng, ngay cả khi không thực hiện bất kỳ thay đổi chế độ ăn uống nào khác.
                Nhược điểm
                Măng tươi có chứa một lượng độc chất taxiphyllin. Tuy nhiên, các phương pháp chế biến khác nhau làm giảm đáng kể hàm lượng taxiphyllin, đảm bảo sự an toàn khi ăn măng.
                Để giảm lượng độc chất trên, măng phải được luộc, ngâm và làm khô trước khi chế biến. 
                Măng tre cũng có nguy cơ ảnh hưởng đến chức năng tuyến giáp. Nghiên cứu trong phòng thí nghiệm ghi nhận một số hợp chất được chiết xuất từ măng như goitrogen làm giảm hoạt động của các tế bào tuyến giáp chịu trách nhiệm sản xuất hormone tuyến giáp.
                Bổ sung đủ iốt và selen trong chế độ ăn uống sẽ ngăn ngừa rối loạn chức năng tuyến giáp. Nấu chín thực phẩm cũng có thể vô hiệu hóa một số enzym và giảm lượng goitrogen còn tồn đọng.
                Vì vậy, bạn có thể yên tâm thưởng thức măng nấu chín như một phần của chế độ ăn uống lành mạnh, đầy đủ, ngay cả khi bạn bị suy giảm chức năng tuyến giáp.
                Cách chế biến
                Măng tươi dễ nấu thành nhiều món ăn khác nhau. Khi sơ chế, người nội trợ cần bóc lớp vỏ cứng bên ngoài. Cho măng vào nước sôi có muối nấu ít nhất 20-30 phút, tối đa 2 giờ ở mức lửa vừa, nhỏ. Điều này giúp loại bỏ vị đắng và làm mềm măng, loại bỏ chất độc hại. Sau đó, bạn cho măng ra khỏi nồi, để nguội và chuẩn bị món ăn mong muốn.
                ',
                'source' => 'An Yên (Theo Livestrong)'
            ],
            [
                'title' => 'Lượng trứng, sữa, trà nên dùng mỗi ngày',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/16/10/t1.jpg',
                'date_update' => '2022-01-16',
                'description' => 'Chúng ta có thể ăn bánh mì, trứng, chuối, uống sữa, trà mỗi ngày, nhưng đừng quên cân đối số lượng, không sử dụng quá nhiều.',
                'content' => '
                Khi cố gắng bổ sung thêm vitamin và khoáng chất từ các loại thực phẩm, bạn có thể dùng quá liều và gây hại cho sức khỏe của mình.
                Dưới đây là định lượng thức ăn hằng ngày từ một số nghiên cứu:
                6 lát bánh mì
                Các hướng dẫn nói rằng một chế độ ăn uống lành mạnh từ 1.800 đến 2.000 calo có thể bao gồm 6 lát bánh mì mỗi ngày. Nhưng bạn không nên ăn quá 3 lát bánh mì trắng làm từ ngũ cốc tinh chế.
                1 quả trứng
                Sẽ rất rủi ro nếu ăn nhiều trứng, đặc biệt là đối với những người bị bệnh tim. Các bác sĩ chuyên khoa khuyên hầu hết mọi người nên ăn một quả trứng mỗi ngày và ít hơn đối với những người có lượng cholesterol trong máu cao. Nếu bạn có sức khỏe tốt, ăn 7 quả trứng mỗi tuần là định lượng phù hợp.
                1 quả cam
                Một quả cam có thể cung cấp đủ vitamin C cho cả ngày. Ăn cam với số lượng lớn dễ gây ra các triệu chứng về đường tiêu hóa, vì vậy bạn nên tránh ăn loại quả này vào buổi tối.
                2 quả chuối
                Chuối cung cấp cho cơ thể các chất dinh dưỡng quan trọng và chất xơ. Bạn có thể ăn 2 quả chuối mỗi ngày như một bữa ăn nhẹ. Loại quả này có tác dụng làm giảm đầy hơi, kiểm soát sự thèm ăn và thay thế đường đã qua chế biến. Tuy nhiên, các chuyên gia cho rằng chỉ ăn chuối vào bữa sáng không đảm bảo đủ năng lượng bởi sau đó bạn sẽ cảm thấy mệt mỏi và đói trở lại.
                3 ly sữa
                Các hướng dẫn về chế độ ăn uống khuyến nghị người lớn nên uống 3 cốc hoặc 732 ml sữa mỗi ngày. Tuy nhiên, hãy cẩn thận nếu cơ thể bạn không dung nạp các thành phần có trong sữa, chẳng hạn như lactose.
                3 tách trà đen
                Các phân tích khác nhau cho thấy uống 3 tách trà đen mỗi ngày giúp giảm nguy cơ đột quỵ. Tuy nhiên, hãy cẩn thận với đồ uống này và lượng caffeine bạn hấp thụ nếu bạn bị bệnh mất ngủ hoặc các trường hợp chống chỉ định khác.
                1 thìa cà phê muối
                Người lớn không nên ăn quá 6g muối mỗi ngày, tương đương 1 thìa cà phê. Định lượng này gồm lượng muối có trong tất cả đồ mặn mà bạn ăn.  
                Hãy cẩn thận về lượng muối bạn cho trẻ ăn: 1 đến 3 tuổi (2g), 4 đến 6 tuổi (3g), 7 đến 10 tuổi (5g), 11 tuổi trở lên ăn như người lớn.
                6 thìa cà phê đường
                Các nhà khoa học đề nghị tiêu thụ không quá 6 thìa cà phê đường mỗi ngày đối với hầu hết phụ nữ. Đàn ông có thể ăn tối đa 9 thìa.
                Nếu bạn uống một lon nước có đường mỗi ngày mà không cắt giảm lượng calo ở những món khác, bạn có thể tăng tới 7 kg trong vòng 3 năm.
                ',
                'source' => 'An Yên (Theo Brightside)'
            ],
            [
                'title' => 'Loại gia vị giá rẻ ở Việt Nam ngăn ngừa đủ loại bệnh tật',
                'image' => 'https://vnn-imgs-f.vgcloud.vn/2022/01/03/13/loai-gia-vi-gia-re-o-viet-nam-ngan-ngua-du-loai-benh-tat.jpg',
                'date_update' => '2022-01-03',
                'description' => 'Nghệ thuộc họ gừng, là loại thực phẩm quen thuộc với người Việt Nam, có trong bài thuốc dân gian chữa viêm loét.',
                'content' => '
                Trong nghệ tươi có curcumin với đặc tính kháng viêm, chống oxy hóa. Do đó, từ lâu, người Việt Nam đã sử dụng nghệ để chữa đau dạ dày. Nghệ có thể bổ sung cho niêm mạc dạ dày một lớp màng bảo vệ, chữa lành vết loét sẵn có, giảm hình thành vết loét mới.
                Nghiên cứu của Đại học Rutgers (Mỹ) cho biết, nghệ kết hợp với phenethyl isothiocyanate giảm phát triển ung thư tuyến tiền liệt. Hóa chất phenethyl isothiocyanate có trong bắp cải, bông cải xanh, cải kale.
                Nghệ cũng được sử dụng để giảm nguy cơ mắc bệnh tim và có khả năng là bệnh Alzheimer.
                Dù vậy, các nhà khoa học cho rằng, để loại thực phẩm này phát huy hiệu quả cần một liều lượng cao. Ngoài ra, giới chuyên môn cũng cần tìm hiểu sâu hơn để khẳng định về các tác dụng đó.
                Nghệ cũng có khả năng cải thiện sức khỏe của bệnh nhân viêm khớp. Một số phân tích ghi nhận sự cải thiện triệu chứng của người bệnh sau khi dùng nghệ.
                Không chỉ tác động tới sức khỏe thể chất, nghệ có tiềm năng mang lại lợi ích với sức khỏe tâm thần. Một nghiên cứu nhỏ cho thấy nghệ có thể sử dụng làm thuốc chống trầm cảm.
                Giới chuyên môn đánh giá, nghệ góp phần giúp nâng cao tuổi thọ. Curcumin trong nghệ là chất chống viêm hiệu quả và giảm nguy cơ phát triển các dạng mất trí nhớ, ung thư và bệnh tim. Như vậy, về mặt lý thuyết, nghệ có khả năng tăng tuổi thọ của bạn.
                Nghệ có vẻ giống như một siêu thực phẩm nhưng không thể dựa hoàn toàn vào đó. Loại gia vị này nên là một phần trong chế độ ăn uống lành mạnh và cân bằng kết hợp với tập thể dục.
                Bạn có thể cho nghệ vào các món ăn hoặc uống tinh bột nghệ pha với nước, mật ong (10-20g mỗi ngày).
                ',
                'source' => 'An Yên (Theo Express)'
            ],
        ]);
    }
}
