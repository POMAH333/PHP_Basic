<?php
// 1. Придумайте класс, который описывает любую сущность из предметной области библиотеки: книга, шкаф, комната и т.п.
class Closet
{

    // 2. Опишите свойства классов из п.1 (состояние).
    const MAX_BOOKS = 10;
    private array $books = [];

    public function __construct(array $initialBooks = [])
    {
        if (!empty($initialBooks)) {
            foreach ($initialBooks as $book) {
                $this->addBook($book);
            }
        }
    }

    // 3. Опишите поведение классов из п.1 (методы).
    public function addBook(string $book)
    {
        if (count($this->books) < self::MAX_BOOKS) {
            $this->books[] = $book;
            echo "Книга '$book' добавлена в шкаф.\n";
        } else {
            echo "Шкаф полон, невозможно добавить книгу '$book'.\n";
        }
    }
    public function pickUpBook(string $book): string|null
    {
        if (in_array($book, $this->books)) {
            $key = array_search($book, $this->books);
            $elem = $this->books[$key];
            unset($books[$key]);
            $this->books = array_values($this->books);
            return $elem;
        } else {
            echo "Книга в шкафу отсутствует";
            return null;
        }

    }
    public function getBooks(): array
    {
        return $this->books;
    }
}

// 4. Придумайте наследников классов из п.1. Чем они будут отличаться?
class ScienceCloset extends Closet
{ // шкаф с научной литиратурой 
    private array $scienceBooks = [];
    public function addBook(string $book)
    {
        if (in_array($book, $this->scienceBooks)) {
            parent::addBook($book);
        } else {
            echo "Книга '$book' не является научной литературой и не может быть добавлена.\n";
        }
    }
    public function getScienceBooks(): array
    {
        return $this->scienceBooks;
    }

    public function setScienceBooks(string $book): void
    {
        $this->scienceBooks[] = $book;
    }
}

/* 5. Создайте структуру классов ведения книжной номенклатуры.
— Есть абстрактная книга.
— Есть цифровая книга, бумажная книга.
— У каждой книги есть метод получения на руки.

У цифровой книги надо вернуть ссылку на скачивание, а у физической – адрес библиотеки, где ее можно получить. У всех книг формируется в конечном итоге статистика по кол-ву прочтений.
Что можно вынести в абстрактный класс, а что надо унаследовать?*/
abstract class Book
{
    protected string $title; // название
    protected string $author; // автор
    protected int $readCount; // количество прочтений 

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->readCount = 0;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getReadCount(): int
    {
        return $this->readCount;
    }

    abstract public function BookIssuance(): string;
}

class DigitalBook extends Book
{
    private string $downloadLink;

    public function __construct(string $title, string $author, string $downloadLink)
    {
        parent::__construct($title, $author);
        $this->downloadLink = $downloadLink;
    }

    public function getDownloadLink(): string
    {
        return $this->downloadLink;
    }

    public function BookIssuance(): string
    {// каждая выдача книги увеличивает количиство прочтений на 1
        $this->readCount++;
        return "Ссылка для скачивания: " . $this->downloadLink;
    }
}

class PhysicalBook extends Book
{
    private string $libraryAddress;

    public function __construct(string $title, string $author, string $libraryAddress)
    {
        parent::__construct($title, $author);
        $this->libraryAddress = $libraryAddress;
    }

    public function getLibraryAddress(): string
    {
        return $this->libraryAddress;
    }

    public function BookIssuance(): string
    {// каждая выдача книги увеличивает количиство прочтений на 1
        $this->readCount++;
        return "Адрес библиотеки: " . $this->libraryAddress;
    }
}

//  6. Дан код:

/*
class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); //1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4
*/

// Что он выведет на каждом шаге? Почему?

//Выводится последовательность целых чисел, потому что переменная $x статическая, и меняет своё значение не зависимо от того из какого объекта к ней обращаются

// Немного изменим п.5

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A
{
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //2
$a1->foo(); //3
$b1->foo(); //4

// Что он выведет теперь?

// Вывод не меняется, потому что переменная осталась статичной, а наследник обращается к родительскому методу