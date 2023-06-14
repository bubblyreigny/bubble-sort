<?php

class BubbleSort {
    
    /**
     * @var array
     */
    private array $numbers_array;

    /**
     * @param array $numbers
     */
    public function __construct(array $numbers) 
    {
        $this->numbers_array = $numbers;
    }

    /**
     * Bubble sort function.
     * 
     * @return void
     */
    private function bubbleSort(): void
    {
        $array_length = count($this->numbers_array);
        for ($i = 0; $i < $array_length - 1; $i++) {
            for ($j = 0; $j < $array_length - $i - 1; $j++) {
                if ($this->numbers_array[$j] > $this->numbers_array[$j + 1]) {
                    $temp = $this->numbers_array[$j];
                    $this->numbers_array[$j] = $this->numbers_array[$j + 1];
                    $this->numbers_array[$j + 1] = $temp;
                }
            }
        }
    }

    /**
     * Get the median number
     * in the array of numbers.
     * 
     * @return int
     */
    public function getMedian(): int
    {
        $this->bubbleSort();
        $array_length = count($this->numbers_array);
        $middle = (int)($array_length / 2);

        if ($array_length % 2 === 0) {
            return ($this->numbers_array[$middle - 1] + $this->numbers_array[$middle]) / 2;
        } else {
            return $this->numbers_array[$middle];
        }
    }

    /**
     * Get the largest number 
     * in the array of numbers.
     * @return int
     */
    public function getLargestValue(): int
    {
        $this->bubbleSort();
        $array_length = count($this->numbers_array);
        return $this->numbers_array[$array_length - 1];
    }
}

class PrintBubbleSort {
    private $bubbleSort;

    public function __construct(BubbleSort $bubbleSort) {
        $this->bubbleSort = $bubbleSort;
    }

    public function printMedianAndLargest() {
        $median = $this->bubbleSort->getMedian();
        $largest = $this->bubbleSort->getLargestValue();

        echo "Median: $median" . PHP_EOL;
        echo "Largest Value: $largest" . PHP_EOL;
    }
}

$array = [5, 55, 26, 27, 35, 17, 43, 10, 9];
$bubbleSort = new BubbleSort($array);
$printBubbleSort = new PrintBubbleSort($bubbleSort);
$printBubbleSort->printMedianAndLargest();

echo $printBubbleSort;
