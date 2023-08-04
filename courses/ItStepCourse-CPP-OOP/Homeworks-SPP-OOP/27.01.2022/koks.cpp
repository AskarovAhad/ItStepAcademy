#include <iostream>
#include <string>
#include <vector>

using namespace std;

class Car {
	string name;
	string motor;
	string dateOut;
	string cost;
public:
	Car() : name(" "), motor(" "), dateOut(" "), cost(" ") { }
	Car(string n, string m, string d, string c) : name(n), motor(m), dateOut(d), cost(c) { }
	Car operator () (string n, string m, string d, string c) {
		Car new_car(n, m, d, c);
		return new_car;
	}
	friend ostream& operator<< (ostream& out, const Car& c);
};
ostream& operator<< (ostream & out, const Car & c) {
	out << "Name: " << c.name << endl;
	out << "Motor: " << c.motor << endl;
	out << "Date out: " << c.dateOut << endl;
	out << "Cost: " << c.cost << endl;
	return out;
}



int main() {
	Car car("Opel", "1000V", "10 10 2010", "10000");
	vector<Car> cars;
	cars.push_back(car);
	Car ncar;
	cars.push_back(ncar("Mercedes", "870V", "12 12 2021", "15000"));
	for (auto x : cars) {
		cout << x;
	}
	return 0;
}