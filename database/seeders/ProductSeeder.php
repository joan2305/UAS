<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->insert(
            [
                [
                    "id" => 1,
                    "image" => "saffron-sihHdJrdlo-20230402013712.jpg",
                    "name" => "Saffron",
                    "price" => 3000000,
                    "discount"=> 0,
                    "originalPrice" => 3000000, 
                    "grocer" => "HappyFresh",
                    "description" =>"Saffron is a spice derived from the flower of Crocus sativus, commonly known as the 'saffron crocus'. The vivid crimson stigma and styles, called threads, are collected and dried for use mainly as a seasoning and colouring agent in food. This saffron won the first position at Today's Best Vegetables.",
                ],
                [
                    "id" => 2,
                    "image" => "romanesco-WmFuMMRvTJ-20230402013740.jpg",
                    "name" => "Romanesco",
                    "originalPrice" => 250000,
                    "discount"=> 10,
                    "price" => 225000, 
                    "grocer" => "PT Tani Hub",
                    "description" =>"This is probably one of the most interesting looking vegetables, with its intricate spiral patterns made up of many buds alternating in size. It originates from Italy and can also be called Romanesco Broccoli or Roman Cauliflower. It is part of the same edible flower family (Brassicas) as Broccoli, Cauliflower, Brussel Sprouts and Cabbage.
                    It can be prepared for recipes in the same way as Broccoli and Cauliflower, but will give a more distinct, earthy, nutty and mildly sweet flavour.",
                ],
                [
                    "id" => 3,
                    "image" => "kohralbi-sjAwZKjdKm-20230402013810.jpg",
                    "name" => "Kohlrabi",
                    "originalPrice" => 400000,
                    "discount"=> 20,
                    "price" => 320000, 
                    "grocer" => "HappyFresh",
                    "description" =>"This vegetable is another new variation of the Cabbage family, with the name Kohlrabi translating to Turnip Cabbage.

                    The taste it gives can be described as a mix between a turnip and water chestnut, with a mild, sweet flavour and crisp, crunchy texture. It originates from Northern Europe and is most commonly consumed in India, as it is an important ingredient in the Kashmiri diet. The roots can be made in to fries, the leaves used in a salad or the stem eaten raw as a low-calorie snack.",
                ],
                [
                    "id" => 4,
                    "image" => "celeriac-pWvQrJmglT-20230402013840.jpg",
                    "name" => "Celeriac",
                    "originalPrice" => 150000,
                    "discount"=> 5,
                    "price" => 142500, 
                    "grocer" => "Sayurbox",
                    "description" =>"Sometimes called stump-rooted celery, turnip-rooted celery or knob celery, this root vegetable is a variety of celery that is cultivated for its large edible spherical roots, leaves and stems.
                    It originates from the Mediterranean Basin and evolved from wild celery which has a small, edible root. Although oddly shaped it is full of delicate flavour, a subtle mix of celery, parsley and nuttiness. It can be eaten raw or cooked, and can be roasted, stewed, blanched or mashed, or alternatively added to soups, casseroles and other savoury dishes. The leaves are also used as a garnish.",
                ],
                [
                    "id" => 5,
                    "image" => "sunchoke-ornehxysTl-20230402013920.jpg",
                    "name" => "Sunchoke",
                    "originalPrice" => 523000,
                    "discount"=> 15,
                    "price" => 444550, 
                    "grocer" => "Sayurbox",
                    "description" =>"These are often referred to as Jerusalem Artichokes, even though they have no association with Jerusalem, or any relation to Artichokes. It is believed that the name derives from the Italian word for sunflower; Girasole, as the plant resembles  a garden sunflower and belongs to the same plant group.

                    These are native to North America and can be found being grown in many American states and are cultivated for their tubers. They are mainly used as an alternative for potatoes, but can also be fermented for use in alcoholic beverages.", 
                ],
                [
                    "id" => 6,
                    "image" => "manioc-DXTZgwORKw-20230402013940.jpg",
                    "name" => "Manioc",
                    "price" => 910000,
                    "discount"=> 0,
                    "originalPrice" => 910000, 
                    "grocer" => "Titipku",
                    "description" =>"Cassava and Yuca are the two most common names given for this root vegetable. It originates from South America but is now widely grown across Africa and Asia due to its drought resistance.
                    There are two main varieties, one being sweet in flavour and the other bitter, with both requiring slightly different cooking techniques. This is largely due to the varying concentrated amounts of cyanide in the vegetable. It is an important food source for the developing world, providing a basic diet for over half a billion people and is the third largest source of food carbohydrates in the tropics. When it is dried and in powdered form it is known as Tapioca. The sweet versions can be steamed, boiled baked, fried or mashed and added to other dishes.",

                ],
                [
                    "id" => 7,
                    "image" => "yardlong-AfOIRRuTvM-20230402032810.jpg",
                    "name" => "Yard-long beans",
                    "price" => 240750,
                    "discount"=> 25,
                    "originalPrice" => 321000, 
                    "grocer" => "PT Tani Hub",
                    "description" =>"Although the name indicates that these green beans will grow to a yard long, they will rarely grow to more than 75cm in length. They can also be called Asparagus Beans, Chinese Long Beans or Snake beans and the pods will grow in pairs.

                    This annual climbing vine is best suited to more tropical climates, therefore is widely grown in South-eastern Asia, Southern China, Africa and South America. They can be used in the same way as green beans  and can be eaten fresh, or cooked in a variety of dishes.",
                ],
                [
                    "id" => 8,
                    "image" => "nopales-taGsofsdcb-20230402032908.jpg",
                    "name" => "Nopales",
                    "price" => 123000,
                    "discount"=> 0,
                    "originalPrice" => 123000, 
                    "grocer" => "HappyFresh",
                    "description" =>"This is the paddle shaped leaves on the cactus plant known as Opuntia, which is native to Mexico but is also grown in many parts of America and the Mediterranean.

                    They must be properly prepared before eating by cleaning and removing the spines, then sliced as required depending on the dish it is being added to. Nopales are a popular ingredient in many Mexican dishes and can be eaten raw or cooked. They are normally grilled or boiled and can be added to salads and stews or used as a side vegetable. The other well-known edible part of this particular Cactus is the fruit known as Prickly Pear.",
                ],
                [
                    "id" => 9,
                    "image" => "brusselberrysprouts-cxDjKGEgrY-20230402033001.jpg",
                    "name" => "Brusselberry sprouts",
                    "originalPrice" => 654000,
                    "discount"=> 5,
                    "price" => 621300, 
                    "grocer" => "Sayurbox",
                    "description" =>"Brussel Sprouts are like the marmite of the vegetable world, they’re either loved or despised. But that might all be about to change thanks to an inventive British farmer who has created an alternative option.

                    Brusselberry Sprouts are reddish purple in colour and have a sweeter, milder taste than standard sprouts. They are becoming more popular around the world, therefore becoming more widely available, and can be a great addition to any Christmas dinner.",
                ],
                [
                    "id" => 10,
                    "image" => "jicama-sKDbSGXWvv-20230402033001.jpg",
                    "name" => "Jicama",
                    "originalPrice" => 411000,
                    "discount"=> 0,
                    "price" => 411000, 
                    "grocer" => "Carisayur",
                    "description" =>"This is sometimes called a Yam Bean or Mexican potato and is a round bulbous root vegetable. It is a part of the legume family which grows on vines. Although it originates in Mexico it is grown in warmer climates such as Central America, the Caribbean, the Andes and Southern Asia.

                    It has a similar texture to a turnip but has a closer taste to an apple. Whether eaten raw or cooked, the thick, papery skin will need to be removed first. The greatest thing with Jicama is that it is so versatile and has so many uses in cooking.",
                ],
                [
                    "id" => 11,
                    "image" => "oca-dRHODjaCNq-20230402033120.jpg",
                    "name" => "Oca",
                    "originalPrice" => 333000,
                    "discount"=> 12,
                    "price" => 279720, 
                    "grocer" => "Carisayur",
                    "description" =>"Also known as the Oxalis Tuberosa or the New Zealand Yam, this is a popular alternative to the potato.

                    It originates from the central and southern Andes and became popular due to its easy cultivation and high tolerance for poor soil, high altitude and harsh climates. There are many variations of the Oca grown around the world with an array of colours and flavours being created through human intervention during cultivation.
                    
                    These versatile tubers can be eaten raw without peeling or cooked in the same way as potatoes: boiled, baked, grilled or fried. Add this to salads, soups, stews, or even make some tasty Oca mash.",
                ],
                
            ]
        );
    }
}