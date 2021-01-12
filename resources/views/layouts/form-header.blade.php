<span class="Phonebook_header">PhoneBook</span>
            <div class="Phonebook_nav">
                <span>
                    <a href="{{ route('sortById') }}">
                        id
                    </a>
                </span>
                <span>
                    <a href="{{ route('sortByName') }}">
                        Name
                    </a>
                </span>
                <span>
                    <a href="{{ route('sortBySurname') }}">
                        Surname
                    </a>
                </span>
                <span>Email</span>
                <span>Phone</span>
                <span>
                    <select class="chooseCategory" id="chooseCategory">
                            <option>All categories</option>
                            <option>Student</option>
                            <option>Programmer</option>
                            <option>Teacher</option>
                            <option>Another</option>
                    </select>
                        <button type="submit" id="Btn_category">ok</button>
                </span>
            </div>