using System.Text;

class fruitsBasket {

    string?[] listFruits;
    int numberOfNullElements;

    public fruitsBasket() {

        listFruits = new string[5];
        for (int i = 0; i < 5; i++) { listFruits[i] = null; }
        numberOfNullElements = 5;

    }

    public string listFruitsToString() {

        StringBuilder stringbuilder = new StringBuilder();

        foreach (string? fruit in listFruits) { stringbuilder.Append($"{fruit} " ?? ""); }

        return stringbuilder.ToString();

    }

    /// <summary>
    /// Add a fruit to the array containing all of the fruits
    /// </summary>
    /// <param name="fruit">The fruit to add</param>
    /// <returns>
    ///     -1 if the fruit is already in the array
    ///     -2 if there is no more space available
    ///     -9 if fruit is empty
    ///     0 if added successfully
    /// </returns>
    public int addFruit(string fruit) {

        if (fruit == string.Empty) return -9;
        if (listFruits.Contains(fruit)) return -1;
        if (numberOfNullElements == 0) return -2;

        listFruits[5 - numberOfNullElements] = fruit;
        return 0;

    }

    /// <summary>
    /// Remove a fruit from the array containing all of the fruits
    /// </summary>
    /// <param name="fruit">The fruit to remove</param>
    /// <returns>
    ///     -1 if the basket is empty
    ///     -2 if the array does not contain the fruit
    ///     -3 if not removed
    ///     -9 if fruit is empty
    ///     0 if removed successfully
    /// </returns>
    public int removeFruit(string fruit) {

        if (fruit == string.Empty) return -9;
        if (numberOfNullElements == 5) return -1;
        if (!listFruits.Contains(fruit)) return -2;

        for (int i = 0; i < numberOfNullElements; i++) {

            if (listFruits[i] == fruit) {

                listFruits[i] = listFruits[5 - numberOfNullElements - 1];
                listFruits[5 - numberOfNullElements - 1] = null;
                numberOfNullElements++;
                return 0;

            }

        }

        return -3;

    }

    public bool isInArray(string fruit) { return listFruits.Contains(fruit); }

}