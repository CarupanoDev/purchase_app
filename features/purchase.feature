Feature: Create a new purchase invoice
    Scenario: Create a new purchase invoice
        Given the request body is:
        """
        {
            "id": "8cc493e9-e021-4cb3-9211-78a9c179730d",
            "supplier": "Medine",
            "payTerm": "lorem ipsu",
            "date": "2021-08-29",
            "createdBy": "Jane Doe",
            "status": "waiting",
            "observations": "ipsu lorem"
        }
        """
        When I post to "api/purchase"
        Then the code response should be 201
