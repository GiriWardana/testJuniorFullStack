<!-- Buatlah Fungsi dari soal berikut.
Data Soal No. 1 sampai No. 4
    
type IFruit = {
fruitId: number,
fruitName: string,
fruitType: 'IMPORT' | 'LOCAL',
stock: number
}
const fruits: IFruit[] = [
{
fruitId: 1,
fruitName: 'Apel',
fruitType: 'IMPORT',
stock: 10
},
{
fruitId: 2,
fruitName: 'Kurma',
fruitType: 'IMPORT',
stock: 20
},
{
fruitId: 3,
fruitName: 'apel',
fruitType: 'IMPORT',
stock: 50
},
{
fruitId: 4,
fruitName: 'Manggis',
fruitType: 'LOCAL',
stock: 100
},
{
fruitId: 5,
fruitName: 'Jeruk Bali',
fruitType: 'LOCAL',
stock: 10
},
{
fruitId: 5,
fruitName: 'KURMA',
fruitType: 'IMPORT',
stock: 20
},
{
fruitId: 5,
fruitName: 'Salak',
fruitType: 'LOCAL',
stock: 150
}
] -->

<?php

use function PHPSTORM_META\type;

$fruits= array(
    array(1,'Apel','IMPORT',10),
    array(2,'Manggis','IMPORT',20),
    array(3,'Kurma','IMPORT',50),
    array(4,'Apel','LOCAL',100),
    array(5,'Jeruk Bali','LOCAL',10),
    array(6,'Kurma','IMPORT',20),
    array(7,'Salak','LOCAL',150)
);
$c=count($fruits);
echo "Soal No 1. Buah apa saja yang dimiliki Andi? (fruitName) </br> Jawaban : </br> Buah buah yang dimiliki andi yaitu : </br> ";

function buahBuah(){ 
    global $fruits,$c;
    for ($x=0;$x<$c;$x++){
        echo "<li>" . $fruits[$x][1] . "</li>";
        
    };
};

echo buahBuah();

echo "</br></br>Soal No 2. Andi memisahkan buahnya menjadi beberapa wadah berdasarkan tipe buah
(fruitType). Berapa jumlah wadah yang dibutuhkan? Dan ada buah apa saja di
masing-masing wadah? </br> Jawaban : </br>";

function jumlahWadah(){
    global $fruits,$c;
    $wadah=array($fruits[0][2]);
    $cu=count($wadah);

    for($x=1;$x<$c;$x++){
        $confirm=0;
        for($y=0;$y<$cu;$y++){
            if($fruits[$x][2] == $wadah[$y]){
                $confirm++;
            };
        };
        if($confirm==0){
            array_push($wadah,$fruits[$x][2]);
            $cu++;
        }; 
    };
    echo 'Jumlah wadah yang dibutuhkan adalah : '.count($wadah).'</br>';
    for ($y=0;$y<$cu;$y++){
        echo 'Wadah '.($y+1). ' : ';
        for ($x=0;$x<$c;$x++){
            if($wadah[$y]==$fruits[$x][2]){
                echo $fruits[$x][1];
                if(($x+1)==$c){echo'.';}else{echo ', ';};
            };
        };
        echo '</br>';
    };
};

echo jumlahWadah();


echo "</br></br>Soal No 3. Berapa total stock buah yang ada di masing-masing wadah?</br>Jawaban : </br>";
function stock(){
    global $fruits,$c;
    $wadah=array($fruits[0][2]);
    $cu=count($wadah);

    for($x=1;$x<$c;$x++){
        $confirm=0;
        for($y=0;$y<$cu;$y++){
            if($fruits[$x][2] == $wadah[$y]){
                $confirm++;
            };
        };
        if($confirm==0){
            array_push($wadah,$fruits[$x][2]);
            $cu++;
        }; 
    };

    for ($y=0;$y<$cu;$y++){
        $sum=0;
        for ($x=0;$x<$c;$x++){
            if($wadah[$y]==$fruits[$x][2]){
                $sum=$sum+$fruits[$x][3];
            };
        };
        echo 'Total stock buah wadah '.($y+1).' : '.$sum.'</br>';
        
    };
};

echo stock();

echo "</br></br>Soal No 4. Apakah ada komentar terkait kasus di atas?";
echo "</br>Jawaban : </br>Seharusnya Id nya tidak boleh sama, sehingga saya harus mengganti soal dengan id yang berbeda"
?>

<!-- SOAL NO 5 
Buatlah fungsi untuk menghitung total komentar yang ada, termasuk semua
balasan komentar. Berdasarkan data di atas, total komentar adalah 7 komentar. -->

<!-- type IComment = {
commentId: number;
commentContent: string;
replies?: IComment[];
}
const comments: IComment[] = [
{
commentId: 1,
commentContent: 'Hai',
replies: [
{
commentId: 11,
commentContent: 'Hai juga',
replies: [
{
commentId: 111,
commentContent: 'Haai juga hai jugaa'
},
{
commentId: 112,
commentContent: 'Haai juga hai jugaa'
}
]
},
{
commentId: 12,
commentContent: 'Hai juga',
replies: [
{
commentId: 121,
commentContent: 'Haai juga hai jugaa'
}
]
}
]
},
{
commentId: 2,
commentContent: 'Halooo'
}
] -->

<?php
$comments = array(
    //0   //0,0-2
    array(1,'1Hai',
        //0,2,0-2
        array(11,'2Hai Juga',
            //0,2,2
            array(
                //0,2,2,0-1
                array(111,'3Haai juga hai jugaa'), //0,2,2,0,0-1
                array(112,'4Haai juga hai jugaa') //0,2,2,1,0-1
            )
        ),
        //0,1,0-2
        array(12,'5Hai Juga',
            array(121,'6Haai juga hai jugaa')
        )
    ),
    //1   //1,0-1
    array(2,'7Halo')
);

echo '</br></br>Soal No 5. Buatlah fungsi untuk menghitung total komentar yang ada, termasuk semua
balasan komentar. Berdasarkan data di atas, total komentar adalah 7 komentar.</br>Jawaban : </br>
';


$sum=0;
function totalComments(){ 
function comment2Var($x,$y){
    global $comments,$sum;
    if ((isset($comments[$x][$y])=='true')&&(is_string($comments[$x][$y])=='true')&&(strlen($comments[$x][$y])>=3)){
         echo ($comments[$x][$y]).'</br>'; $sum++;
    };
};
function comment3Var($x,$y,$z){
    global $comments,$sum;
        if ((isset($comments[$x][$y][$z])=='true')&&(is_string($comments[$x][$y][$z])=='true')&&(strlen($comments[$x][$y][$z])>=3)){
            echo ($comments[$x][$y][$z]).'</br>'; $sum++;
        };
};
function comment4Var($x,$y,$z,$a){
    global $comments,$sum;
    if ((isset($comments[$x][$y][$z][$a])=='true')&&(is_string($comments[$x][$y][$z][$a])=='true')&&(strlen($comments[$x][$y][$z][$a])>=3)){
         echo ($comments[$x][$y][$z][$a]).'</br>'; $sum++;
    };
};

function comment5Var($x,$y,$z,$a,$b){
    global $comments,$sum;
    if ((isset($comments[$x][$y][$z][$a][$b])=='true')&&(is_string($comments[$x][$y][$z][$a][$b])=='true')&&(strlen($comments[$x][$y][$z][$a][$b])>=3)){
         echo ($comments[$x][$y][$z][$a][$b]).'</br>'; $sum++;
    };
};

for($x=0;$x<4;$x++){
    for($y=0;$y<4;$y++){
        comment2Var($x,$y);
        for($z=0;$z<4;$z++){
            comment3Var($x,$y,$z); 
            for($a=0;$a<4;$a++){
                comment4Var($x,$y,$z,$a);
                for($b=0;$b<4;$b++){
                    comment5Var($x,$y,$z,$a,$b);
                };
            };
        };
    };
};
global $sum;
echo 'Total komentar adalah :'.$sum;
};
totalComments();

?>