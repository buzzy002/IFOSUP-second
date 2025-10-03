static class Display {

    public static void mainDisplay() {

        Console.WriteLine("To add a fruit press \"a\"");
        Console.WriteLine("To remove a fruit, press \"r\"");
        Console.WriteLine("To see what's inside your basket, press \"i\"");
        Console.WriteLine("To search if a fruit is in your basket, \"s\"");

        Console.WriteLine("\nIf you want to exit the game, press \"q\"");

        Console.WriteLine("\n");

        Console.WriteLine("What do you want to do ? ");

    }

    public static void displayBasket(string basket) {

        if (basket == string.Empty) Console.WriteLine("Your basket is empty :(");
        else Console.WriteLine($"In your basket you have {basket}");

    }

    public static void displayWelcome() { Console.WriteLine("Welcome ! For now your fruits basket is empty :( Quick ! Add some fruits!"); }

    public static void displayAlreadyInArray(string fruit) { Console.WriteLine($"The fruit {fruit} you're trying to add is already in the basket"); }
    public static void displayInArray(string fruit) { Console.WriteLine($"The fruit {fruit} is in the basket"); }
    public static void displayNotInArray(string fruit) { Console.WriteLine($"The fruit {fruit} is not in the basket"); }

    public static void displayWhatToAdd() { Console.WriteLine("What's the name of the fruit you want to add ? "); }
    public static void displayWhatToRemove() { Console.WriteLine("Which fruit do you want to remove from your basket ? "); }
    public static void dislayWhatToSearch() { Console.WriteLine("What's the name of the fruit you're searching ? "); }

    public static void displayAddedSuccessfully(string fruit) { Console.WriteLine($"The fruit {fruit} has been added to the basket successfully"); }
    public static void displayRemovedSuccessfully(string fruit) { Console.WriteLine($"The fruit {fruit} has been removed from the basket successfully"); }

    public static void displayNoMoreSpace() { Console.WriteLine("There is no space left in your basket"); }
    public static void displayNotValidCharacter() { Console.WriteLine("Are you sure you pressed a valid key ?"); }

    public static void displayEndGame() { Console.Write("The game will close, press ENTER key..."); }

}