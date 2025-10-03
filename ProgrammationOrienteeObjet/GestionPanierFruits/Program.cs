class Program {

    public static void Main() {

        fruitsBasket basket = new fruitsBasket();

        string userInput;
        string fruit = string.Empty;
        int? statusOfMethod = null;
        char? methodUsed = null;

        Display.displayWelcome();

        do {
            Display.mainDisplay();

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
                    break;

                case "s":
                    Display.dislayWhatToSearch();
                    string fruitToSearch = Console.ReadLine() ?? string.Empty;
                    if (fruitToSearch == string.Empty) Display.displayNotValidCharacter();
                    if (basket.isInArray(fruitToSearch)) Display.displayInArray(fruitToSearch);
                    else Display.displayNotInArray(fruitToSearch);
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

                switch (statusOfMethod) {

                    case -1:
                        Display.displayAlreadyInArray(fruit);
                        break;

                    case -2:
                        Display.displayNoMoreSpace();
                        break;

                    case -9:
                        Display.displayNotValidCharacter();
                        break;

                    case 0:
                        Display.displayAddedSuccessfully(fruit);
                        break;

                    default:
                        break;

                }
            }

            else if (methodUsed == 'r') {

                switch (statusOfMethod) {

                    case -1:
                        Display.displayBasket(basket.listFruitsToString());
                        break;

                    case -2:
                        Display.displayNotInArray(fruit);
                        break;

                    case -9:
                        Display.displayNotValidCharacter();
                        break;

                    case 0:
                        Display.displayRemovedSuccessfully(fruit);
                        break;

                    default:
                        break;

                }

            }

            Console.Write("Press ENTER to continue...");
            Console.ReadLine();
            Console.Clear();

            methodUsed = null;
            statusOfMethod = null;

        } while (true);
    }

}