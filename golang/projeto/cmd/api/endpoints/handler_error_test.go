package endpoints

import (
	"emailn/internal/internalErrors"
	"encoding/json"
	"errors"
	"github.com/stretchr/testify/assert"
	"net/http"
	"net/http/httptest"
	"testing"
)

func Test_HandlerError_when_endpoint_returns_internal_error(t *testing.T) {
	ass := assert.New(t)
	endpoint := func(w http.ResponseWriter, r *http.Request) (interface{}, int, error) {
		return nil, 0, internalErrors.ErrInternal
	}
	handlerFunc := HandlerError(endpoint)
	req, _ := http.NewRequest("GET", "/", nil)
	res := httptest.NewRecorder()

	handlerFunc.ServeHTTP(res, req)
	ass.Equal(http.StatusInternalServerError, res.Code)
	ass.Contains(res.Body.String(), internalErrors.ErrInternal.Error())
}

func Test_HandlerError_when_endpoint_returns_domain_error(t *testing.T) {
	ass := assert.New(t)
	endpoint := func(w http.ResponseWriter, r *http.Request) (interface{}, int, error) {
		return nil, 0, errors.New("domain error")
	}
	handlerFunc := HandlerError(endpoint)
	req, _ := http.NewRequest("GET", "/", nil)
	res := httptest.NewRecorder()

	handlerFunc.ServeHTTP(res, req)
	ass.Equal(http.StatusBadRequest, res.Code)
	ass.Contains(res.Body.String(), "domain error")
}

func Test_HandlerError_when_endpoint_returns_object_and_status(t *testing.T) {
	ass := assert.New(t)
	type bodyForTest struct {
		Id int
	}
	objectExpected := bodyForTest{Id: 2}
	endpoint := func(w http.ResponseWriter, r *http.Request) (interface{}, int, error) {
		return objectExpected, 201, nil
	}
	handlerFunc := HandlerError(endpoint)
	req, _ := http.NewRequest("GET", "/", nil)
	res := httptest.NewRecorder()

	handlerFunc.ServeHTTP(res, req)
	ass.Equal(http.StatusCreated, res.Code)
	objectReturned := bodyForTest{}
	json.Unmarshal(res.Body.Bytes(), &objectReturned)
	ass.Equal(objectExpected, objectReturned)
}
