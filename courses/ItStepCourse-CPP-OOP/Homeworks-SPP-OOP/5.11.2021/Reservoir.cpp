#include <iostream>
#include <string>
using namespace std;

class Size {
	int length;
	int width;
	int high;
public:
	Size(int lengthP, int widthP, int highP) : length{ lengthP }, width{ widthP }, high{ highP } {}
	Size() : Size{ 0, 0, 0 } {}
	int getLen() const {
		return length;
	}
	void setLen(int lengthP) {
		length = lengthP;
	}
	int getWid() const {
		return width;
	}
	void setWid(int widthP) {
		width = widthP;
	}
	int getHigh() const {
		return high;
	}
	void setHigh(int highP) {
		high = highP;
	}
	friend class Reservoir;
	friend void Print(Reservoir arr);
};

class Reservoir {
	string name;
	Size c;
	string type;
public:
	Reservoir(string nameP, Size cP, string typeP) : name{ nameP }, c{ cP }, type{ typeP } {}
	Reservoir() : Reservoir("", Size(), "") {}
	string getName() const {
		return name;
	}
	void setName(string nameP) {
		name = nameP;
	}
	Size getSize() const {
		return c;
	}
	void setSize(Size obj) {
		c = obj;
	}
	string getType() const {
		return type;
	}
	void SetType(string typeP) {
		type = typeP;
	}
	friend void Print(Reservoir arr);
};

void Menu() {
	cout << "1 - ADD\n";
	cout << "2 - DELETE\n";
	cout << "3 - CAPACITY\n";
	cout << "4 - AREA\n";
	cout << "5 - COMPARISE\n";
	cout << "6 - COPY\n";
	cout << "7 - SHOW\n";
	cout << "0 - EXIT\n";
	cout << "---->";
}
Reservoir Put() {
	string name, type;
	int length, width, high;
	Size obj;
	cout << "Name - ";
	cin >> name;
	cout << "Size of reservoir: " << endl;
	cout << "Length - ";
	cin >> length;
	cout << "Width - ";
	cin >> width;
	cout << "High - ";
	cin >> high;
	cout << "Type of reservoir - ";
	cin >> type;
	obj.setHigh(high);
	obj.setLen(length);
	obj.setWid(width);
	return { name, obj, type};
}

Reservoir* Add(Reservoir* arr, int& size) {
	size++;
	Reservoir* new_arr = new Reservoir[size];
	for (int i = 0; i < size - 1; i++) {
		new_arr[i] = arr[i];
	}
	new_arr[size - 1] = Put();
	return new_arr;
}
Reservoir* Del(Reservoir* arr, int& size, string name) {
	size--;
	Reservoir* new_arr = new Reservoir[size];
	int j = 0;
	for (int i = 0; i < size + 1; i++) {
		if (arr[i].getName() == name) continue;
		new_arr[j] = arr[i];																	   
		j++;																					   
	}																							   
	return new_arr;																				   
}
int SizeAndArea(Reservoir* arr, int size, string name, int command) {
	int count = 0;
	for (int i = 0; i < size; i++) {
		if (arr[i].getName() == name) {
			count = (command == 3) ? arr[i].getSize().getLen() * arr[i].getSize().getWid() * arr[i].getSize().getHigh() :
				arr[i].getSize().getLen() * arr[i].getSize().getWid();
		}
	}
	return count;
}
bool Compare(Reservoir* arr, int size, string n1, string n2) {
	int a, b;
	a = SizeAndArea(arr, size, n1, 4);
	b = SizeAndArea(arr, size, n2, 4);
	if (a > b) return true;
	else return false;
}
void Copy(Reservoir* arr, int size, string n1, string n2) {
	for (int i = 0; i < size; i++) {
		if (arr[i].getName() == n1) {
			for (int j = 0; j < size; j++) {
				if (arr[j].getName() == n2) {
					arr[i] = arr[j];
					break;
				}
			}
			break;
		}
	}
}
void Print(Reservoir arr) {
	cout << "Name: " << arr.name << endl;
	cout << "Size: " << endl;
	cout << "Length - " << arr.c.getLen() << endl;
	cout << "Width - " << arr.c.getWid() << endl;
	cout << "High - " << arr.c.getHigh() << endl;
	cout << "Type: " << arr.type << endl;
	cout << endl;
}
bool CheckName(Reservoir* arr, int size, string name) {
	for (int i = 0; i < size; i++) {
		if (arr[i].getName() == name) {
			return true;
			break;
		}
	}
	return false;
}
int CountName(Reservoir* arr, int size, string name) {
	int count = 0;
	for (int i = 0; i < size; i++) {
		if (arr[i].getName() == name) {
			count++;
		}
	}
	return count;
}
int main() {
	int size = 0, answer;
	Reservoir* arr = nullptr;
	string n1, n2;
	Menu();
	cin >> answer;
	while (answer != 0) {
		if (answer == 1) {
			system("cls");
			arr = Add(arr, size);
			system("cls");
		}
		if (answer == 2) {
			system("cls");
			cout << "Enter name of reservoir: " ;
			cin.get();
			getline(cin, n1);
			if (CheckName(arr, size, n1) == true) {
				if (CountName(arr, size, n1) > 1) {
					cout << "There are several such names of reservoirs" << endl;
					cout << "Enter type of reservoir which you want to delete" << endl;
					string type; cin >> type;
					arr = Del(arr, size, type);
				}
				else arr = Del(arr, size, n1);
			}
			else cout << "Error name" << endl;
		}
		if (answer == 3 || answer == 4) {
			system("cls");
			cout << "Enter name of reservoir: ";
			cin.get();
			getline(cin, n1);
			if (CheckName(arr, size, n1) == true)	cout << SizeAndArea(arr, size, n1, answer) << endl;
			else cout << "Error\n" ;
		}
		if (answer == 5) {
			system("cls");
			cout << "Enter names of reservoirs to comapre areas: ";
			cout << "1 - "; 
			cin.get();
			getline(cin, n1);
			if (CheckName(arr, size, n1) == true) {
				cout << "2 - "; cin >> n2;
				if (CheckName(arr, size, n2) == true) {
					if (Compare(arr, size, n1, n2))	cout << n1 << " > " << n2 << endl;
					else cout << n1 << " < " << n2 << endl;
				}
				else cout << "Error second name" << endl;
			}
			else cout << "Error first name" << endl;

		}
		if (answer == 6) {
			system("cls");
			cout << "Enter name - ";
			cin.get();
			getline(cin, n1);
			cout << "Enter name of reservoir which will copied to " << n1 << ": ";
			cin.get();
			getline(cin, n2);
			Copy(arr, size, n1, n2);
			cout << "Copying is completed\n";
		}
		if (answer == 7) {
			system("cls");
			for (int i = 0; i < size; i++) {
				Print(arr[i]);
			}
		}
		Menu();
		cin >> answer;
		system("cls");
	}
	return 0;
}