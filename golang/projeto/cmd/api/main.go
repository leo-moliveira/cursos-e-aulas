package main

import (
	"encoding/json"
	"github.com/go-chi/chi/v5"
	"github.com/go-chi/render"
	"net/http"
)

type product struct {
	ID   int
	Name string
}

// type myHandler struct{}
//
//	func (m myHandler) ServeHTTP(w http.ResponseWriter, r *http.Request) {
//		w.Write([]byte("myHandler")) //default golang
//	}
func main() {
	r := chi.NewRouter()
	r.Use(myMiddleware2)
	r.Use(myMiddleware)
	//m := myHandler{}
	//r.Handle("/handler", m)

	r.Get("/", func(w http.ResponseWriter, r *http.Request) {
		param := r.URL.Query().Get("name")
		println("endpoint")
		msg := "HOME"

		if param != "" {
			msg = param
		}

		w.Write([]byte(msg))
	})

	r.Get("/{productName}", func(w http.ResponseWriter, r *http.Request) {
		param := chi.URLParam(r, "productName")
		w.Write([]byte(param))
	})

	r.Get("/json", func(w http.ResponseWriter, r *http.Request) {
		w.Header().Set("Content-Type", "application/json")
		obj := map[string]string{"message": "success"}
		b, _ := json.Marshal(obj)
		w.Write(b)
	})

	r.Get("/json2", func(w http.ResponseWriter, r *http.Request) {
		obj := map[string]string{"message": "success"}
		render.JSON(w, r, obj)
	})

	r.Post("/product", func(w http.ResponseWriter, r *http.Request) {
		var product product
		product.ID = 5
		render.DecodeJSON(r.Body, &product)
		render.JSON(w, r, product)
	})

	http.ListenAndServe(":3000", r)
}

func myMiddleware(next http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		println("before")
		next.ServeHTTP(w, r)
		println("after")
	})
}
func myMiddleware2(next http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		println("request ", r.Method, " url ", r.RequestURI)
		next.ServeHTTP(w, r)
		println("after 2")
	})
}
