<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre_01 = new Genre();
        $genre_01->name_genre = 'Bachata';
        $genre_01->save();

        $genre_02 = new Genre();
        $genre_02->name_genre = 'Baladas';
        $genre_02->save();

        $genre_03 = new Genre();
        $genre_03->name_genre = 'Blues';
        $genre_03->save();

        $genre_04 = new Genre();
        $genre_04->name_genre = 'Bolero';
        $genre_04->save();

        $genre_05 = new Genre();
        $genre_05->name_genre = 'Bosa Nova';
        $genre_05->save();

        $genre_06 = new Genre();
        $genre_06->name_genre = 'Celta';
        $genre_06->save();

        $genre_07 = new Genre();
        $genre_07->name_genre = 'Clásica';
        $genre_07->save();

        $genre_08 = new Genre();
        $genre_08->name_genre = 'Corrido';
        $genre_08->save();

        $genre_09 = new Genre();
        $genre_09->name_genre = 'Country';
        $genre_09->save();

        $genre_10 = new Genre();
        $genre_10->name_genre = 'Criollo';
        $genre_10->save();

        $genre_11 = new Genre();
        $genre_11->name_genre = 'Cumbia';
        $genre_11->save();

        $genre_12 = new Genre();
        $genre_12->name_genre = 'Disco';
        $genre_12->save();

        $genre_13 = new Genre();
        $genre_13->name_genre = 'Djent';
        $genre_13->save();

        $genre_14 = new Genre();
        $genre_14->name_genre = 'Dubstep';
        $genre_14->save();

        $genre_15 = new Genre();
        $genre_15->name_genre = 'Electrónica';
        $genre_15->save();

        $genre_16 = new Genre();
        $genre_16->name_genre = 'Electro Pop';
        $genre_16->save();

        $genre_17 = new Genre();
        $genre_17->name_genre = 'Flamenco';
        $genre_17->save();

        $genre_18 = new Genre();
        $genre_18->name_genre = 'Folk';
        $genre_18->save();

        $genre_19 = new Genre();
        $genre_19->name_genre = 'Funk';
        $genre_19->save();

        $genre_20 = new Genre();
        $genre_20->name_genre = 'Garage Rock';
        $genre_20->save();

        $genre_21 = new Genre();
        $genre_21->name_genre = 'Gospel';
        $genre_21->save();

        $genre_22 = new Genre();
        $genre_22->name_genre = 'Grunge';
        $genre_22->save();

        $genre_23 = new Genre();
        $genre_23->name_genre = 'Hard Rock';
        $genre_23->save();

        $genre_24 = new Genre();
        $genre_24->name_genre = 'Heavy Metal';
        $genre_24->save();

        $genre_25 = new Genre();
        $genre_25->name_genre = 'Hip Hop';
        $genre_25->save();

        $genre_26 = new Genre();
        $genre_26->name_genre = 'House';
        $genre_26->save();

        $genre_27 = new Genre();
        $genre_27->name_genre = 'Indie';
        $genre_27->save();

        $genre_28 = new Genre();
        $genre_28->name_genre = 'Jazz';
        $genre_28->save();

        $genre_29 = new Genre();
        $genre_29->name_genre = 'K-Pop';
        $genre_29->save();

        $genre_30 = new Genre();
        $genre_30->name_genre = 'Merengue';
        $genre_30->save();

        $genre_31 = new Genre();
        $genre_31->name_genre = 'Polka';
        $genre_31->save();

        $genre_32 = new Genre();
        $genre_32->name_genre = 'Pop';
        $genre_32->save();

        $genre_33 = new Genre();
        $genre_33->name_genre = 'Punk';
        $genre_33->save();

        $genre_34 = new Genre();
        $genre_34->name_genre = 'Ranchera';
        $genre_34->save();

        $genre_35 = new Genre();
        $genre_35->name_genre = 'Rap';
        $genre_35->save();

        $genre_36 = new Genre();
        $genre_36->name_genre = 'Reggae';
        $genre_36->save();

        $genre_37 = new Genre();
        $genre_37->name_genre = 'Reggaeton';
        $genre_37->save();

        $genre_38 = new Genre();
        $genre_38->name_genre = 'Rock';
        $genre_38->save();

        $genre_39 = new Genre();
        $genre_39->name_genre = 'Rock Psicodélico';
        $genre_39->save();

        $genre_40 = new Genre();
        $genre_40->name_genre = 'Rumba';
        $genre_40->save();

        $genre_41 = new Genre();
        $genre_41->name_genre = 'Salsa';
        $genre_41->save();

        $genre_42 = new Genre();
        $genre_42->name_genre = 'Samba';
        $genre_42->save();

        $genre_43 = new Genre();
        $genre_43->name_genre = 'Soul';
        $genre_43->save();

        $genre_44 = new Genre();
        $genre_44->name_genre = 'Swing';
        $genre_44->save();

        $genre_45 = new Genre();
        $genre_45->name_genre = 'Tango';
        $genre_45->save();

        $genre_46 = new Genre();
        $genre_46->name_genre = 'Techno';
        $genre_46->save();

        $genre_47 = new Genre();
        $genre_47->name_genre = 'Trash metal';
        $genre_47->save();

        $genre_48 = new Genre();
        $genre_48->name_genre = 'Trap';
        $genre_48->save();

        $genre_49 = new Genre();
        $genre_49->name_genre = 'Trova';
        $genre_49->save();

        $genre_50 = new Genre();
        $genre_50->name_genre = 'Vals';
        $genre_50->save();

    }
}
