<?php

namespace haka002\Bottles;

class BottlesOfBeerSong
{
	const NUMBER_OF_BOTTLES  = 99;
	const VERSE_TEXT_ROW_1_2 = 'No more bottles of beer on the wall, no more bottles of beer.';
	const VERSE_TEXT_ROW_2_2 = 'Go to the store and buy some more, 99 bottles of beer on the wall.';

	/**
	 * Returns an array witch contains the rows of the song.
	 *
	 * @return array
	 */
	public function sing()
	{
		$songRows     = [];
		$verseBuilder = new VerseBuilder(static::NUMBER_OF_BOTTLES);

		for ($i = static::NUMBER_OF_BOTTLES; $i > 0; $i--)
		{
			$verseBuilder->setCountOfBottles($i);
			$verseBuilder->build();

			$songRows = array_merge($songRows, $verseBuilder->get());
		}

		$songRows[] = static::VERSE_TEXT_ROW_1_2;
		$songRows[] = static::VERSE_TEXT_ROW_2_2;

		return $songRows;
	}
}
