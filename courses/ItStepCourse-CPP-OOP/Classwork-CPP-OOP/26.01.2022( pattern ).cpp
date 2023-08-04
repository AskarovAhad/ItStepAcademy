#include <iostream>
#include <vector>

using namespace std;

class Transport {
public:
	virtual ~Transport() {}
	virtual string Deliver() const = 0;
};

class Truck : public Transport {
public:
	string Deliver() const override { return "Delivered by truck"; }
};

class Ship : public Transport {
public:
	string Deliver() const override { return "Delivered by ship"; }
};

class Plane : public Transport {
public:
	string Deliver() const override { return "Delivered by plane"; }
};

class Logistics {
public:
	virtual Transport* createTransport() const = 0;
	string What() const {
		Transport* t = this->createTransport();
		string result = "Factory: I'm work with " + t->Deliver();
		delete t;
		return result;
	}

};

class RoadLogistics : public Logistics {
public:
	RoadLogistics() {}
	Transport* createTransport() const override {
		return new Truck;
	}
};

class SeaLogistics : public Logistics {
public:
	SeaLogistics() {}
	Transport* createTransport() const override {
		return new Ship;
	}
};

class AirLogistics : public Logistics {
public:
	AirLogistics() {}
	Transport* createTransport() const override {
		return new Plane;
	}
};

void SomeCode(const Logistics& log) {
	cout << log.What() << endl;
}

int main() {
	vector<Logistics*> l;
	l.push_back(new AirLogistics);
	l.push_back(new RoadLogistics);
	l.push_back(new SeaLogistics);
	for (auto& x : l) { SomeCode(*x); }

	return 0;
}