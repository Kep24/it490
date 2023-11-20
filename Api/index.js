const people = [
    { name: 'adri'},
    { name: 'becky'},
    { name: 'chris'},
    { name: 'dillon'},
    { name: 'evan'},
    { name: 'frank'},
    { name: 'georgette'},
    { name: 'hugh'},
    { name: 'igor'},
    { name: 'jacoby'},
    { name: 'kristina'},
    { name: 'lemony'},
    { name: 'matilda'},
    { name: 'nile'},
    { name: 'ophelia'},
    { name: 'patrick'},
    { name: 'quincy'},
    { name: 'roslyn'},
    { name: 'solene'},
    { name: 'timothy'},
    { name: 'uff'},
    { name: 'violet'},
    { name: 'wyatt'},
    { name: 'x'},
    { name: 'yadri'},
    { name: 'zack'},
]
//retrieves the button by class and assigns it to a constant
const searchInput = document.querySelector('.input')

//attaches event listener to the constant
searchInput.addEventListener("input", (e)=>{
    //declares and assigns the value of the event's target(search bar info) to a variable
    let value = e.target.value

    //checks for input, and if input is larger than 0
    if (value && value.trim().length > 0){
        //redefines value to exclude white space and change input to lowercase
        value = value.trim().toLowerCase()
        //returns only the results of setList if value of search is included in the person's name
        setList(people.filter(person => {
            return person.name.includes(value)
        }))
        
    } else {
        //return nothing
        clearList()

    }
})

//foundation for clear button
const clearButton = document.getElementById('clear')

clearButton.addEventListener("click", ()=> {
    clearList()
})

//creates/declares a function called "setList"
//setList takes in a param of "results"
function setList(results){
    clearList()
    for (const person of results){
    //creates a li element for each result item
    const resultItem = document.createElement('li')

    //adds a class to each item of the results
    resultItem.classList.add('result-item')

    //grabs the name of the current point of the loop and adds the name as the list item's text
    const text = document.createTextNode(person.name)

    //appends the text to the result item
    resultItem.appendChild(text)

    //appends the result item to the list
    list.appendChild(resultItem)
    }
    if (results.length === 0 ) {
        noResults()
    }
}

//clears the results from the page
function clearList(){
    //looping through each child of the search results list and removes them
    while (list.firstChild){
        list.removeChild(list.firstChild)
    }
}

//displays a no results screen
function noResults(){
    //creates an element for the error
    const error = document.createElement('li')
    //adds a class name of "error-message" to the error element
    error.classList.add('error-message')

    //creates text for our element
    const text = document.createTextNode('No results found. Sorry!')
    //appends the text to our element
    error.appendChild(text)
    //appends the error to our list element
    list.appendChild(error)
}