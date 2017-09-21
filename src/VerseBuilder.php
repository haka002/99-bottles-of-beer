<?php

namespace haka002\Bottles;

class VerseBuilder
{
	const VERSE_TEXT_ROW_1 = '%s of beer on the wall, %s of beer.';
	const VERSE_TEXT_ROW_2 = 'Take one down and pass it around, %s of beer on the wall.';

	/**
	 * @var int
	 */
	private $numberOfBottles;

	/**
	 * @var int
	 */
	private $countOfBottles;

	/**
	 * @var array
	 */
	private $generatedRows;

	/**
	 * @param int $numberOfBottles
	 */
	public function __construct($numberOfBottles)
	{
		$this->numberOfBottles = (int)$numberOfBottles;
	}

	/**
	 * @param int $countOfBottles
	 *
	 * @return $this
	 */
	public function setCountOfBottles($countOfBottles)
	{
		$this->countOfBottles = $countOfBottles;

		return $this;
	}

	public function build()
	{
		$countOfBottles = $this->countOfBottles > 1
			? $this->countOfBottles . ' bottles'
			: $this->countOfBottles . ' bottle';

		$bottlesWord = $this->countOfBottles - 1 > 1
			? ' bottles'
			: ' bottle';

		$decreased = $this->countOfBottles > 1
			? $this->countOfBottles - 1 . $bottlesWord
			: 'no more bottles';

		$this->generatedRows = [
			sprintf(static::VERSE_TEXT_ROW_1, $countOfBottles, $countOfBottles),
			sprintf(static::VERSE_TEXT_ROW_2, $decreased)
		];

	}

	public function get()
	{
		return $this->generatedRows;
	}
}
