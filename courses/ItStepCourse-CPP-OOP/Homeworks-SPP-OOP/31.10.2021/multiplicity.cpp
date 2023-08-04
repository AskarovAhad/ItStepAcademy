#include <iostream>
#include <iomanip>

using namespace std;

int index = 0;
class Mnojestva {
	int size;
	int* arr = nullptr;
public:
	Mnojestva(int* arrP, int sizeP) : size{ sizeP }, arr{ arrP ? new int[sizeP] : nullptr } {
		if (arr != nullptr) {
			for (int i = 0; i < sizeP; i++) {
				arr[i] = arrP[i];
			}
		}
	}
	Mnojestva() : Mnojestva(0, 0) {}
	Mnojestva(const Mnojestva& obj) : arr{ new int[obj.size] }, size{ obj.size }{
		for (int i = 0; i < size; i++) {
			arr[i] = obj.arr[i];
		}
	}
	Mnojestva(const Mnojestva& obj, int num) : arr{ new int[obj.size + 1] }, size{ obj.size + 1 } {
		for (int i = 0; i < size - 1; i++) {
			arr[i] = obj.arr[i];
		}
		arr[size - 1] = num;
	}
	~Mnojestva() {
		delete[] arr;
	}
	int GetSize() const{
		return size;
	}
	void SetSize(int new_size) {
		size = new_size;
	}
	int* GetArr() const{
		return arr;
	}
	void SetArr(int* new_arr, int new_size) {
		arr = new int[new_size];
		for (int i = 0; i < new_size; i++) {
			arr[i] = new_arr[i];
		}
	}
};

void CommandList(int& command);

ostream& operator<<(ostream& stream, const Mnojestva& obj) { 
	for (int i = 0; i < obj.GetSize(); i++) {
		stream << obj.GetArr()[i] << " ";
	}
	return stream;
}
istream& operator>>(istream& stream, Mnojestva& obj) { 
	int size = 0;
	cout << "Size - ";
	stream >> size;
	int* arr = new int[size];
	cout << "Array: ";
	for (int i = 0; i < size; i++) {
		stream >> arr[i];
	}
	obj.SetSize(size);
	obj.SetArr(arr, size);
	return stream;
}
Mnojestva operator+(const Mnojestva& obj, int num) { // добавление элемента 
	for (int i = 0; i < obj.GetSize(); i++) {
		if (obj.GetArr()[i] == num) return obj;
	}
	return Mnojestva(obj, num);
}
Mnojestva operator-(Mnojestva& obj, int num) { // удаление элемента
	for (int i = 0; i < obj.GetSize(); i++) {
		if (obj.GetArr()[i] == num) {
			swap(obj.GetArr()[i], obj.GetArr()[obj.GetSize() - 1]);
			obj.SetSize(obj.GetSize() - 1);
			return Mnojestva(obj);
		}
	}
	return Mnojestva(obj);
}
Mnojestva operator+(const Mnojestva& a, const Mnojestva& b) { // объединение 
	int new_size = a.GetSize() + b.GetSize();
	int* new_arr = new int[new_size];
	for (int i = 0; i < a.GetSize(); i++) {
		new_arr[i] = a.GetArr()[i];
	}
	for (int i = 0; i < b.GetSize(); i++) {
		new_arr[a.GetSize() + i] = b.GetArr()[i];
	}
	return { new_arr, new_size };
}
Mnojestva operator*(const Mnojestva& a, const Mnojestva& b) { // пересечение
	int new_size = 0;
	int index = 0;
	for (int i = 0; i < a.GetSize(); ++i) {
		for (int j = 0; j < b.GetSize(); ++j) {
			if (a.GetArr()[i] == b.GetArr()[j]) {
				++new_size;
			}
		}
	}
	int* new_arr = new int[new_size];
	for (int i = 0; i < a.GetSize(); ++i) {
		for (int j = 0; j < b.GetSize(); ++j) {
			if (a.GetArr()[i] == b.GetArr()[j]) {
				new_arr[index++] = a.GetArr()[i];
			}
		}
	}
	return { new_arr, new_size };
}
bool operator==(const Mnojestva& a, const Mnojestva& b) { // сравнение
	for (int i = 0; i < a.GetSize(); i++) {
		for (int j = 0; j < b.GetSize(); j++) {
			if (a.GetArr()[i] == b.GetArr()[j]) return true;
			else return false;
		}
	}
}

int main() {
	Mnojestva a, b;
	int command = 0;
	cout << "Fill the sets of numbers" << endl;
	cout << "Set of numbers 'a' : " << endl;
	cin >> a;	// не проверяет уникальны ли введенные элементы множества
	cout << "Set of numbers 'b' : " << endl;
	cin >> b;	// так же с этим множеством
	CommandList(command);
	do {
		if (command == 1) {
			system("cls");
			cout << "To which set you want to add? 1 - a, 2 - b" << endl;
			int s; cin >> s;
			cout << "Enter a number - ";
			int n; cin >> n;
			Mnojestva x{ ((s == 1) ? a : b) + n };	// проверяет какое множество было выбрано и добавляет
			((s == 1) ? a : b).SetArr(x.GetArr(), x.GetSize());
			((s == 1) ? a : b).SetSize(x.GetSize());
			cout << a << endl;
			cout << b << endl;
		}
		else if (command == 2) {
			system("cls");
			cout << "To which set you want to delete? 1 - a, 2 - b" << endl;
			int s; cin >> s;
			cout << "Enter a number - ";
			int n; cin >> n;
			Mnojestva x{ ((s == 1) ? a : b) - n };	// также проверяет и удаляет
			((s == 1) ? a : b).SetArr(x.GetArr(), x.GetSize());
			((s == 1) ? a : b).SetSize(x.GetSize());
			cout << a << endl;
			cout << b << endl;
		} 
		else if (command == 3) {
			system("cls");
			Mnojestva x{ a + b };
			cout << "Combine:" << x << endl;	// новое множество состоящее из объединения 'a' и 'b'
		}
		else if (command == 4) {
			system("cls");
			Mnojestva x{ a * b };
			cout << "Intersection: " << x << endl;	// новое множество состоящее из пересечения 'a' и 'b'
		}
		else if (command == 5) {	// после завершения программы VS выводит ошибку если была использована эта команда, хотя все нормально работает 
			system("cls");
			cout << "To which set of numbers do you want to assign?" << endl;
			cout << "1: a = b" << endl;
			cout << "2: b = a" << endl;
			int s; cin >> s;
			(s == 1) ? a = b : b = a;	// проверка на выбор множества и присваивание
			cout << endl << a << endl << b << endl;
		}
		else if (command == 6) {
			system("cls");
			(a == b) ? cout << "Both sets of numbers are equal" << endl << a << endl << b << endl :
				cout << "Sets of numbers are not equal" << endl << a << endl << b << endl;
		}
		else if (command == 7) {
			system("cls");
			cout << "Set of numbers 'a': " << a << endl;
			cout << "Set of numbers 'b': " << b << endl;
		}
		CommandList(command);
	} while (command != 0);

	return 0;
}
void CommandList(int& command) {
	cout << "Choose the command: " << endl;
	cout << "1 - Adding to set of numbers" << endl;
	cout << "2 - Deleting from set of numbers" << endl;
	cout << "3 - Combine two sets" << endl;
	cout << "4 - Intersection of two sets" << endl;
	cout << "5 - Assign the set" << endl;
	cout << "6 - Comparison" << endl;
	cout << "7 - Show all" << endl;
 	cout << "0 - Exit" << endl;
	cin >> command;
}
