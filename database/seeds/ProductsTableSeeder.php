<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Product::create([
            'id' => 1,
            'active' => true,
            'id_measure_unit' => 2,
            'id_category' => 1,
            'name' => 'Eau de source',
            'description' => 'eau de source',
            'min_threshold' => 10,
            'max_threshold' => 30,
            'unit_price' => 1
        ]);

        Product::create([
            'id' => 2,
            'active' => true,
            'id_measure_unit' => 5,
            'id_category' => 1,
            'name' => 'Eau 1.5L',
            'description' => 'eau en btl',
            'min_threshold' => 50,
            'max_threshold' => 100,
            'unit_price' => 1.1
        ]);

        Product::create([
            'id' => 3,
            'active' => true,
            'id_measure_unit' => 2,
            'id_category' => 1,
            'name' => 'Vinaigre',
            'description' => '',
            'min_threshold' => 1,
            'max_threshold' => 3,
            'unit_price' => 3
        ]);

        Product::create([
            'id' => 4,
            'active' => false,
            'id_measure_unit' => 4,
            'id_category' => 1,
            'name' => 'Poison',
            'description' => 'attention danger ! spécial enfants turbulants !',
            'min_threshold' => 1,
            'max_threshold' => 3,
            'unit_price' => 50
        ]);

        Product::create([
            'id' => 5,
            'active' => true,
            'id_measure_unit' => 4,
            'id_category' => 1,
            'name' => 'Poisson',
            'description' => '',
            'min_threshold' => 1,
            'max_threshold' => 3,
            'unit_price' => 3
        ]);

        Product::create([
            'id' => 6,
            'active' => true,
            'id_measure_unit' => 1,
            'id_category' => 1,
            'name' => 'Steack congelé',
            'description' => '',
            'min_threshold' => 60,
            'max_threshold' => 100,
            'unit_price' => 1
        ]);

        Product::create([
            'id' => 7,
            'active' => true,
            'id_measure_unit' => 1,
            'id_category' => 2,
            'name' => 'Sopalin',
            'description' => 'moelleux',
            'min_threshold' => 20,
            'max_threshold' => 60,
            'unit_price' => 2
        ]);

        Product::create([
            'id' => 8,
            'active' => true,
            'id_measure_unit' => 5,
            'id_category' => 1,
            'name' => 'Coca 1.5L',
            'description' => 'coca en btl',
            'min_threshold' => 100,
            'max_threshold' => 500,
            'unit_price' => 1.5
        ]);


//         foreach(range(1, 150) as $index)
//         {
//             Product::create([
//                 'active' => $faker->boolean($chanceOfGettingTrue = 75),
//                 'id_measure_unit' => $faker->numberBetween($min = 1, $max = 5),
//                 'id_category' => $faker->numberBetween($min = 1, $max = 4),
//                 'name' => $faker->word,
//                 'description' => $faker->text,
//                 'min_threshold' => $faker->numberBetween($min = 0, $max = 10),
//                 'max_threshold' => $faker->numberBetween($min = 0, $max = 30),
//                 'unit_price' => $faker->numberBetween($min = 0, $max = 6),
//             ]);
//         }

        $arrayCoursesHebdo = array(

        "AUCHAN EMMENTAL PORTION 400G",
        "AUCHAN BLANC POULET 6 TRANCHES 240GR ",
        "TOMATES 1KG",
        "POMME GOLDEN 1ER PRIX 2KG ",
        "RIK ROK CLEMENTINE 1KG",
        "RIK ET ROK BANANE 1KG",
        "AUCHAN BEURRE TENDRE FACILE A TARTINER DEMI-SEL 250G",
        "Œufs moyens datés du jour X 20",
        "GALMIER FILET POULET BLANC X6",
        "LAIT ENTIER 1L",
        "YAOURT A BOIRE LK FRAISE X10",
        "AUCHAN THON ALBACORE AU NATUREL 280G",
        "SAUCE PESTO 200GR",
        "POUCE SEL FIN BOITE VERS 750G",
        "RIZ 1KG",
        "Farine Francine Fluide 1kg",
        "AUCHAN SAUCE TOMATE BOLOGNAIS",
        "AUCHAN SAUCE TOMATE CUISINEE 850CL",
        "TORTI 1KG",
        "KUB OR",
        "VINAIGRE BLANC 1L",
        "DUCROS CURRY BOITE MENAGERE",
        "HUILE D'OLIVE AUCHAN 1L",
        "DUCROS POIVRE BLANC MOULU 1OOG",
        "JUS DE CITRON 1L",
        "HUILE POUR FRITURE AUCHAN 2L",
        "AUCHAN KETCHUP NATURE 1KG",
        "MOUTARDE AUCHAN",
        "AUCHAN MAYONNAISE BOCAL 710G",
        "CHOCOLAT EN POUDRE NESQUIK 1KG",
        "AUCHAN CHOCOLAT LAIT ALPIN X3",
        "RIK ROK FOURRES FRAISE",
        "COMPOTE RIK ET ROK FRUIT X12",
        "POUCE FOURRES RONDS CHOCOLAT X3",
        "RIK ROK FOURRES VANILLE",
        "DADDY SUCRE MORCEAUX N4 1 KG",
        "DADDY SUCRE EN POUDRE 750g",
        "FILTRE À CAFÉ N°2 X40",
        "MAISON DU CAFE ESPRESSO DECA",
        "MAISON DU CAFE ESPRESSO SUPREM",
        "FONTAINE LUMINEUSE ANNIVERSAIRE",
        "NETTOYANT TAPIS",
        "SACS POUBELLE 30L X20",
        "SACS POUBELLE 100L X10",
        "RECHARGE DÉSODORISANT AIR WICK",
        "GANTS MAPA TAILLE L",
        "SAVON LIQUIDE",
        "LINGETTES AUCHAN NETTOYANTES X50",
        "NETTOYANT MEUBLE",
        "SACS CONGÉLATION 3L X50",
        "AUCHAN CARRES ABSORBANTS X5",
        "LIQUIDE VAISSELLE AUCHAN CITRON 750ML",
        "BLOC WC AUCHAN X3",
        "ÉPONGES MULTI USAGE X3",
        "FOUR ET GRILL AUCHAN",
        "PAPIER ALUMINIUM 1ER PRIX 50M",
        "DESTOP ENTRETIEN CANALISATIONS",
        "GEL WC AUCHAN",
        "EPONGE MÉTALIQUE X3",
        "LIQUIDE RINCAGE LAVE VAISSELLE",
        "AUCHAN LESSIVE PASTILLES VAISSELLE",
        "LINGETTES BÉBÉ",
        "LESSIVE PASTILLES LINGE X80",
        "RECHARGE NETTOYANT VITRE AUCHAN 750ML",
        "DÉSODORISANT",
        "NETTOYANT ÉCRAN PLAT",
        "SEL RÉGÉNÉRANT LAVE VAISSELLE AUCHAN 1KG",
        "GANTS TAILLE L",
        "FEBREZE",
        "NETTOYANT MULTI-SURFACE 1L",
        "SANYTOL DÉSINFECTANT MULTI-USAGE",
        "PAPIER TOILETTE X16",
        "ESSUIE TOUT GROS ROULEAU",
        "ESSUIE TOUT X2",
        "AUCHAN SIROP MENTHE 1.5L",
        "CRISTALINE petite bouteille 0,5L",
        "CRISTALINE EAU PLATE 1,5L",
        "AUCHAN SIROP GRENADINE 1.5L",
        "AMPOULE HD12 - H4 55W 12V",
        "BATTEUR ÉLECTRIQUE",
        "KIT CREPES TEFAL (BOL, FOUET, SPATULE, LOUCHE)",
        "CREPIERE SHINNING 28cm",
        "FAITOUT",
        "CUISEUR RIZ 2,5L",
        "AMPOULE H7 5W 12V",
        "AMPOULE PY21W (BLANCHE) 21W 12V",
        "AMPOULE PY21W (ORANGE) 21W 12V",
        "W5W 5W 12V",
        "P21/5W 5W 12V",
        "H4",
        "RENOVE PLASTIQUE INTERIEUR",
        "BOUGIES QUAD petit culot (CR7HSA) NGK R",
        "GOBELETS",
        "PETITES CUILLÈRES TRANSPARENTES PLASTIQUE",
        "ASSIETTES JETABLES 23CM AVEC MOTIFS",
        "SERVIETTES PAPIER BLANC X200 SERV 30CM",
        "STYLOS BIC CRISTAL BLEU X50",
        "PUNAISES",
        "SCOTCH",
        "ENVELOPPE A5 (X 100)",
        "ENVELOPPE US (X 100)",
        "FEUILLES DOUBLES A4 GRANDS CARREAUX",
        "RAMETTE AUCHAN",
//         "LEGUMES 1KG (Printanière ou ratatouille) NE PAS PRENDRE : CHAMPETRE, POTAGE JARDINIER Attention 4 Saisons avec lardons (n'en prendre qu'une)",
        "STEACK X25",
        "POISSON FINDUS CROUSTIBAT X18 550G",
        "AUCHAN FRITES CLASSIQ TOURN 2,5KG",
//         "SACS ASPIRATEUR KARCHER 6-959-130",
//         "SACS ASPIRATEUR VOITURE KARCHER 6.904.143",
//         "BAC PLASTIQUE RIGIDE GRIS FONCÉ (rangement des affaires des élèves)",

        );

        foreach($arrayCoursesHebdo as $name) {

            Product::create([
                'active' => true,
                'id_measure_unit' => 1,
                'id_category' => 1,
                'name' => $name,
//                 'max_threshold' => $faker->numberBetween($min = 0, $max = 30),
                'unit_price' => $faker->randomFloat(2, 0, $max = 12),
            ]);

        }

        Product::create([
            'active' => true,
            'id_measure_unit' => 1,
            'id_category' => 1,
            'name' => "LEGUMES 1KG (Printanière ou ratatouille)",
            'description' => "NE PAS PRENDRE : CHAMPETRE, POTAGE JARDINIER Attention 4 Saisons avec lardons (n'en prendre qu'une)",
            'unit_price' => $faker->randomFloat(2, 0, $max = 12),
        ]);


        $arrayCoursesHebdo = array(

        "SACS ASPIRATEUR KARCHER 6-959-130",
        "SACS ASPIRATEUR VOITURE KARCHER 6.904.143",
        "BAC PLASTIQUE RIGIDE GRIS FONCÉ (rangement des affaires des élèves)",

        );

        foreach($arrayCoursesHebdo as $name) {

            Product::create([
                'active' => true,
                'id_measure_unit' => 1,
                'id_category' => 3,
                'name' => $name,
//                 'max_threshold' => $faker->numberBetween($min = 0, $max = 30),
                'unit_price' => $faker->randomFloat(2, 0, $max = 12),
            ]);

        }


    }
}
