class Program {

    public static void Main() {

        fruitsBasket basket = new fruitsBasket();

        string userInput;
        string fruit;
        int? statusOfMethod;
        char? methodUsed;

        Display.mainDisplay();

        do {
            userInput = Console.ReadLine() ?? string.Empty;

            switch (userInput) {
                case "a":
                    Display.displayWhatToAdd();
                    fruit = Console.ReadLine() ?? string.Empty;
                    methodUsed = 'a';
                    statusOfMethod = basket.addFruit(fruit);
                    break;

                case "r":
                    Display.displayWhatToRemove();
                    methodUsed = 'r';
                    fruit = Console.ReadLine() ?? string.Empty;
                    statusOfMethod = basket.removeFruit(fruit);
                    break;

                case "i":
                    Display.displayBasket(basket.listFruitsToString());
                    methodUsed = null;
                    statusOfMethod = null;
                    break;

                case "s":
                    Display.dislayWhatToSearch();
                    string fruitToSearch = Console.ReadLine() ?? string.Empty;
                    if (fruitToSearch == string.Empty) Display.displayNotValidCharacter();
                    if (basket.isInArray(fruitToSearch)) Display.displayInArray(fruitToSearch);
                    else Display.displayNotInArray(fruitToSearch);
                    methodUsed = null;
                    statusOfMethod = null;
                    break;

                case "q":
                    Display.displayEndGame();
                    Console.ReadLine();
                    Environment.Exit(-1);
                    break;

                default:
                    Display.displayNotValidCharacter();
                    break;

            }

            if (methodUsed == 'a') {

                switch

            }

            } while (true) ;

        }

}