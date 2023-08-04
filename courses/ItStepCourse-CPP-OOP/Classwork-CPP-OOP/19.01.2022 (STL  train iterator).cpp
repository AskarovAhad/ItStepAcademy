#include <iostream>
#include <vector>
#include <iterator>
using namespace std;

class train {
public:
	train(int number, string destination, string departure)
		: number_{ number }, destination_{ destination }, departure_{ departure } {}
	int getNumber() const {
		return number_;
	}
	string getDestination() const {
		return destination_;
	}
	string getDeparture() const {
		return departure_;
	}
private:
	int number_;
	string destination_;
	string departure_;
};
void AddTrain(vector<train>& t) {
	int num;
	string destination, departure;
	cin >> num >> destination >> departure;
	t.push_back(train(num, destination, departure));
}
void ShowAllInfo(vector<train>& t) {
	for (auto item : t) {
		cout << item.getNumber() << endl;
		cout << item.getDestination() << endl;
		cout << item.getDeparture() << endl;
		cout << endl;
	}
}

//void ShowTrain(vector<train>& t, int trainNumber) { //обычный итератор
//	if (t.empty()) {
//		cout << "DB empty\n";
//		return;
//	}
//	for (vector<train>::iterator it = t.begin(); it != t.end(); it++) {
//		if (it->getNumber() == trainNumber) {
//			cout << it->getNumber() << endl
//				<< it->getDestination() << endl
//				<< it->getDeparture() << endl;
//			break;
//		}
//	}
//}

void ReverseShowTrain(vector<train>& t, int trainNumber) { //реверсный итератор
	if (t.empty()) {
		cout << "DB empty\n";
		return;
	}
	for (vector<train>::reverse_iterator it = t.rbegin(); it != t.rend(); it++) {
		if (it->getNumber() == trainNumber) {
			cout << it->getNumber() << endl
				<< it->getDestination() << endl
				<< it->getDeparture() << endl;
			break;
		}
	}
}

int main() {
	vector<train> db;
	AddTrain(db);
	AddTrain(db);
	ShowAllInfo(db);
	//ShowTrain(db, 12);	
	ReverseShowTrain(db, 12);

	return 0;
}